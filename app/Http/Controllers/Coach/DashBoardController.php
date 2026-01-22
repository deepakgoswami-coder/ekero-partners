<?php

namespace App\Http\Controllers\Coach;
use App\Models\CoachTask;
use App\Http\Controllers\Controller;
use App\Models\HelpSupport;
use App\Models\Transaction;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Group;
use App\Models\GroupMember;
use App\Models\PortalSet;
use App\Models\Leader;
use App\Models\User;
use App\Models\Contribution;
use Carbon\Carbon;
use App\Models\Notification;
use App\Models\ChatMessage;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Session as LSession;
use Stripe\PaymentIntent;

class DashBoardController extends Controller
{

    public function dashboard()
    {
        $user = Auth::user();
        $assignedLeadersCount = is_array($user->assign_leader) ? count($user->assign_leader) : 0;

        $groupId = GroupMember::where('user_id', $user->id)->value('group_id');
        $member = GroupMember::where('user_id', $user->id)->first();

        if ($groupId) {
            $group = Group::find($groupId);
            $groupMembers = GroupMember::where('group_id', $groupId)->get();
        } else {
            $group = null;
            $groupMembers = collect();
        }

        $portal = $group ? PortalSet::find($group->portal_set_id) : null;
        $leader = $group ? User::find($group->leader_id) : null;

        $weeklyCommitment = GroupMember::where('user_id', $user->id)->value('weekly_commitment') ?? 0;

        $contributions = Contribution::where('user_id', $user->id)->latest()->get();
        $userContribution = Contribution::where('user_id', $user->id)->sum('amount');

        $groupContribution = $groupId ? Contribution::where('group_id', $groupId)->sum('amount') : 0;
        $supportDetails = HelpSupport::first() ?? null;
        $portalSet = PortalSet::where('isFull', 0)->first();

        // Initialize chart data with empty arrays
        $weekLabels = [];
        $weeklyContributions = [];
        $weeklyRevenue = [];

        if ($portalSet && $portalSet->start_date && $portalSet->end_date) {
            $startDate = Carbon::parse($portalSet->start_date);
            $endDate = Carbon::parse($portalSet->end_date);

            $totalWeeks = ceil($startDate->diffInDays($endDate) / 7);
            
            for ($i = 1; $i <= $totalWeeks; $i++) {
                $weekStart = $startDate->copy()->addDays(($i - 1) * 7);
                $weekEnd = $startDate->copy()->addDays($i * 7 - 1);

                $weekContributions = Contribution::whereBetween('contribution_date', [$weekStart, $weekEnd])
                    ->sum('amount');

                $weekRevenue = Transaction::whereBetween('paid_date', [$weekStart, $weekEnd])
                    ->sum('payout_amount');

                $weeklyContributions[] = (float) $weekContributions;
                $weeklyRevenue[] = (float) $weekRevenue;

                $weekLabels[] = "Week " . $i;
            }
        }

        // Fix: Check if $groupId exists and get group IDs array
        $groupIds = $groupId ? [$groupId] : [];
        
        $activeMembers = !empty($groupIds) ?
            GroupMember::whereIn('group_id', $groupIds)->where('is_active', true)->count() : 0;

        $inactiveMembers = !empty($groupIds) ?
            GroupMember::whereIn('group_id', $groupIds)->where('is_active', false)->count() : 0;

        $pendingMembers = !empty($groupIds) ?
            GroupMember::whereIn('group_id', $groupIds)->where('has_recived', false)->count() : 0;

        // Fixed: Use !empty() instead of isNotEmpty() for arrays
        $groupPerformance = [];
        if (!empty($groupIds)) {
            $groups = Group::whereIn('id', $groupIds)
                ->withSum('contributions', 'amount')
                ->get();

            foreach ($groups as $groupItem) {
                $completionRate = $groupItem->target_amount > 0 ?
                    ($groupItem->contributions_sum_amount / $groupItem->target_amount) * 100 : 0;

                $groupPerformance[] = [
                    'name' => $groupItem->name,
                    'completion_rate' => round($completionRate, 2),
                    'target_amount' => $groupItem->target_amount,
                    'current_amount' => $groupItem->contributions_sum_amount ?? 0
                ];
            }
        }

        // NEW: Get contribution data for bar chart (grouped by date)
        $contributionData = [];
        if ($groupId) {
            $contributionData = Contribution::where('group_id', $groupId)
                ->selectRaw('DATE(contribution_date) as date, SUM(amount) as total_amount')
                ->groupBy('date')
                ->orderBy('date')
                ->get();
        }

        // NEW: Get data for pie chart (user vs group counts)
        $userContributionsCount = Contribution::where('user_id', $user->id)->count();
        $groupMembersCount = $groupId ? GroupMember::where('group_id', $groupId)->count() : 0;

        return view("coach.dashboard", compact(
            'member',
            'assignedLeadersCount',
            'pendingMembers',
            'inactiveMembers',
            'user',
            'activeMembers',
            'weekLabels',
            'weeklyRevenue',
            'weeklyContributions',
            "group",
            "portal",
            "leader",
            "groupMembers",
            "contributions",
            'weeklyCommitment',
            'supportDetails',
            'userContribution',
            'groupContribution',
            'groupPerformance',
            'contributionData', // NEW: For bar chart
            'userContributionsCount', // NEW: For pie chart
            'groupMembersCount' // NEW: For pie chart
        ));
    }

    public function leaderList() {
        $assignedIds = Auth::user()->assign_leader;
        if (is_string($assignedIds)) {
            $assignedIds = json_decode($assignedIds, true) ?: [];
        }
        $leaders = User::whereIn('id', (array)$assignedIds)->with('group')->paginate(10);
        return view('coach.leader_list', compact('leaders'));
    }

    public function calender()
    {
        $user = auth()->user();
        $assignedIds = is_array($user->assign_leader) 
                        ? $user->assign_leader 
                        : json_decode($user->assign_leader, true);
        $assignedIds = $assignedIds ?? [];
        $leaders = \App\Models\User::where('role', 2)
                    ->whereIn('id', $assignedIds)
                    ->get();
        // Database se tasks fetch karein
        $tasks = CoachTask::with('receiver') // 'receiver' relationship model mein honi chahiye
            ->where('sender_id', Auth::id())
            ->get()
            ->map(function($task) {
                return [
                    'id'    => $task->id,
                    'title' => ($task->receiver ? $task->receiver->name : 'Task'), // Leader ka naam title mein
                    'start' => $task->task_date, // FullCalendar format (YYYY-MM-DD)
                    'extendedProps' => [
                        'comment' => $task->comments,
                        'image'   => $task->image ? asset($task->image) : null
                    ],
                    'backgroundColor' => '#4e73df', // Aap color change kar sakte hain
                    'borderColor'     => '#4e73df',
                    'textColor'       => '#ffffff'
                ];
            });

        return view('coach.calendar.index', compact('leaders', 'tasks'));
    }

    public function sendMessage(Request $request) {
        // 1. Check karein agar files hain ya nahi
        if ($request->hasFile('files')) {
            $files = is_array($request->file('files')) ? $request->file('files') : [$request->file('files')];

            foreach ($files as $file) {
                $path = $file->store('chat_files', 'public');
                
                $mime = $file->getMimeType();
                $fileType = 'other';
                
                if (str_contains($mime, 'audio')) $fileType = 'audio';
                elseif (str_contains($mime, 'video')) $fileType = 'video';
                elseif (str_contains($mime, 'image')) $fileType = 'image';

                // Har file ke liye ek record create karein
                \App\Models\ChatMessage::create([
                    'sender_id'   => auth()->id(),
                    'receiver_id' => $request->leader_id,
                    'chat'        => $request->message, // Message text ko har file ke saath save kar rahe hain
                    'file'        => $path,
                    'file_type'   => $fileType,
                ]);
            }
        } else {
            \App\Models\ChatMessage::create([
                'sender_id'   => auth()->id(),
                'receiver_id' => $request->leader_id,
                'chat'        => $request->message,
            ]);
        }

        return response()->json(['status' => 'success']);
    }
    // 2. Task Store karne ka method
    public function storeTask(Request $request)
    {
        $request->validate([
            'leader_id' => 'required',
            'date'      => 'required|date',
            'comment'   => 'required',
            'image'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $imagePath = null;
            
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads/tasks'), $imageName);
                $imagePath = 'uploads/tasks/' . $imageName;
            }

            CoachTask::create([
                'sender_id'   => Auth::id(),
                'receiver_id' => $request->leader_id,
                'task_date'   => $request->date,
                'comments'    => $request->comment,
                'image'       => $imagePath,
            ]);

            // Success hone par is route par redirect karein
            return redirect()->route('coach.calender.index')->with('success', 'Task assigned successfully!');

        } catch (\Exception $e) {
            // Failed hone par error message ke saath wapas bhejein
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

     public function logout()
    {
        Auth::logout();
        return redirect('/coach/login');
    }
   public function chatLeaderList(Request $request)
    {
        // 1. Data ko string se array mein convert karein
        $assignedIds = auth()->user()->assign_leader;

        if (is_string($assignedIds)) {
            $assignedIds = json_decode($assignedIds, true) ?: [];
        }

        // 2. Query chalaein
        $leaders = User::whereIn('id', (array)$assignedIds)->with('group')->paginate(10);

        if ($request->ajax() && $request->has('leader_id')) {
            $leaderId = $request->leader_id;
            $authId = auth()->id();

            $messages = \App\Models\ChatMessage::where(function($q) use ($authId, $leaderId) {
                $q->where('sender_id', $authId)->where('receiver_id', $leaderId);
            })->orWhere(function($q) use ($authId, $leaderId) {
                $q->where('sender_id', $leaderId)->where('receiver_id', $authId);
            })->orderBy('created_at', 'asc')->get();

            return response()->json(['messages' => $messages]);
        }

        return view('coach.chat_leader_list', compact('leaders'));
    }
    public function readAllNotification(Request $request)
    {

        Notification::where('receiver_id', Auth::id())
            ->where('is_read', false)
            ->update(['is_read' => true]);


        return redirect()->back(); // or return JSON if using AJAX

    }

    public function userProfile(Request $request)
    {
        $user = Auth::user();
        return view("coach.profile", compact("user"));
    }

    public function userUpdateProfile(Request $request)
    {
        $user = Auth::user();
        $file = $request->file('profile_image');

        if ($file) {
            $destinationPath = public_path('uploads');
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0775, true);
            }

            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $fileName);
            chmod($destinationPath . '/' . $fileName, 0775);

            $user->profile_image = $fileName;
        }
        $user->name = $request->name;
        $user->address = $request->address;
        $user->save();

        return redirect()->route("coach.dashboard")->with('success', 'Profile Updated successsfully');

    }

    public function myContribution()
    {
        $user = Auth::user();
        $groupId = GroupMember::where('user_id', $user->id)->pluck('group_id');
        $group = Group::where('id', $groupId)->first();
        $groupMembers = GroupMember::where('group_id', $groupId)->get();
        $portal = PortalSet::where('id', $group->portal_set_id)->first();
        $leader = User::where('id', $group->leader_id)->first();
        $contributions = Contribution::where('user_id', $user->id)->latest()->get();
        $weeklyCommitment = GroupMember::where('user_id', $user->id)->first()->weekly_commitment;

        return view('user.contribution', compact('user', "group", "portal", "leader", "groupMembers", "contributions", 'weeklyCommitment'));
    }


    public function PaymentRecieptDownload()
    {
        $user = auth()->user();
        $contributions = Contribution::with('group')
            ->where('user_id', $user->id)
            ->orderBy('week_number', 'desc')
            ->get();

        // Calculate statistics
        $totalPayments = $contributions->count();
        $totalAmount = $contributions->sum('amount');
        $completedPayments = $contributions->where('status', 'completed')->count();
        // Get user's weekly commitment from group_members table
        $weeklyCommitment = GroupMember::where('user_id', $user->id)
            ->value('weekly_commitment') ?? 0;
         $share = GroupMember::where('user_id', $user->id)
            ->value('group_sare') ?? 0;
        
        // Calculate current week (you might have your own logic for this)
        $currentWeek = 1; // Replace with your week calculation

        $groupId = GroupMember::where('user_id', $user->id)->value('group_id');

        if ($groupId) {
            $group = Group::find($groupId);
            $groupMembers = GroupMember::where('group_id', $groupId)->get();
        } else {
            $group = null;
            $groupMembers = collect();
        }
        $portal = PortalSet::find($group->portal_set_id);


        return view('user.payment_reciepts', compact(
            'contributions',
            'totalPayments',
            'totalAmount',
            'share',
            'portal',
            'completedPayments',
            'weeklyCommitment',
            'currentWeek'
        ));
    }

    public function getContributionTrends()
    {
        $userId = Auth::id();

        $contributions = Contribution::where('user_id', $userId)
            ->selectRaw('MONTH(paid_date) as month, SUM(amount) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Format data for Chart.js
        $labels = [];
        $data = [];

        foreach ($contributions as $row) {
            $labels[] = date("M", mktime(0, 0, 0, $row->month, 1)); // e.g., Jan, Feb
            $data[] = $row->total;
        }
        dd($data, $labels);

        return response()->json([
            'labels' => $labels,
            'data' => $data
        ]);
    }

    public function myContributionPay(Request $request)
    {
        $request->validate([
            'group_id' => 'required|exists:groups,id',
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:1',
            'week_number' => 'required|integer|min:1',
        ]);

        LSession::put('contribution_data', $request->only(['group_id', 'user_id', 'amount', 'week_number']));

        Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'inr',
                        'product_data' => [
                            'name' => "Contribution for Week " . $request->week_number,
                        ],
                        'unit_amount' => $request->amount * 100,
                    ],
                    'quantity' => 1,
                ]
            ],
            'mode' => 'payment',
            'success_url' => route('admin.stripe.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('admin.stripe.cancel'),
        ]);
        return redirect()->away($session->url);
    }

    public function stripeSuccess(Request $request)
    {
        $user = auth()->user();
        $data = session('contribution_data');

        if (!$data) {
            return redirect()->route('user.my.contribution')
                ->with('error', 'Payment data missing!');
        }

        $session_id = $request->get('session_id');

        if (!$session_id) {
            return redirect()->route('user.my.contribution')
                ->with('error', 'Missing Stripe session ID.');
        }

        Stripe::setApiKey(config('services.stripe.secret'));
        $checkoutSession = Session::retrieve($session_id);

        $paymentIntentId = $checkoutSession->payment_intent;

        $paymentIntent = PaymentIntent::retrieve($paymentIntentId);

        $contribution = new Contribution();
        $contribution->group_id = $data['group_id'];
        $contribution->user_id = $data['user_id'];
        $contribution->week_number = $data['week_number'];
        $contribution->amount = $data['amount'];
        $contribution->transaction_id = $paymentIntentId;
        $contribution->contribution_date = now();
        $contribution->status = 'completed';
        $contribution->payment_method = 'stripe';
        $contribution->save();

        $this->createNotification(
            "Week {$data['week_number']} contribution paid via Stripe (Txn: {$paymentIntentId})",
            $user->id,
            $user->id
        );

        session()->forget('contribution_data');

        return redirect()->route('user.my.contribution')
            ->with('success', 'Payment successful & contribution saved. Transaction ID: ' . $paymentIntentId);
    }

    public function stripeCancel()
    {
        session()->forget('contribution_data');

        return redirect()->route('user.my.contribution')
            ->with('error', 'Payment cancelled.');
    }

    public function migration()
    {
        \Artisan::call('migrate', [
            '--force' => true,
        ]);

        return "Migration completed successfully.";
    }
}


