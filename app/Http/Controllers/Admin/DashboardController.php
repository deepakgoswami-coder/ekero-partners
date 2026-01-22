<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Contribution;
use App\Models\Ebook;
use App\Models\Group;
use App\Models\HelpSupport;
use App\Models\GroupMember;
use App\Models\LeaderBankdetails;
use App\Models\News;
use App\Models\PortalSet;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
   public function index()
{
    try {
        $portalSet = PortalSet::where('isFull', 0)->first();
        
        if (!$portalSet) {
            return $this->returnSafeData();
        }

        $groupIds = Group::where('portal_set_id', $portalSet->id)->pluck('id')->toArray();
        
        if (empty($groupIds)) {
            return $this->returnSafeData($portalSet);
        }

        // Use only simple, direct database queries - no relationships
        $data = $this->getDashboardData($portalSet, $groupIds);
        return view('admin.dashboard.index', $data);

    } catch (\Exception $e) {
        \Log::error('Dashboard fatal error: ' . $e->getMessage());
        return $this->returnSafeData();
    }
}

public function overAllChat()
    {
        // Step 1: Pehle Unique Conversation Pairs nikalen
        $conversations = \App\Models\ChatMessage::selectRaw('
                LEAST(sender_id, receiver_id) as user_one, 
                GREATEST(sender_id, receiver_id) as user_two, 
                MAX(created_at) as last_time
            ')
            ->groupBy('user_one', 'user_two')
            ->orderBy('last_time', 'desc')
            ->get();

        foreach ($conversations as $chat) {
            // Step 2: User ki details nikalen
            $chat->userOneDetails = \App\Models\User::find($chat->user_one);
            $chat->userTwoDetails = \App\Models\User::find($chat->user_two);

            // Step 3: Combined Array bnaein (56->23 ho ya 23->56, sab ek hi list mein aayenge)
            $chat->combined_chats = \App\Models\ChatMessage::where(function($q) use ($chat) {
                    $q->where('sender_id', $chat->user_one)->where('receiver_id', $chat->user_two);
                })
                ->orWhere(function($q) use ($chat) {
                    $q->where('sender_id', $chat->user_two)->where('receiver_id', $chat->user_one);
                })
                ->orderBy('created_at', 'asc') // Taki chat history sequence mein dikhe
                ->get();
        }

        // dd($conversations); // Ab aap check karenge toh har item mein 'combined_chats' ka array hoga
        return view('admin.dashboard.overallChat', compact('conversations'));
    }

private function getDashboardData($portalSet, $groupIds)
{
    // Simple direct queries only - no Eloquent relationships
    return [
        'groupCount' => Group::where('portal_set_id', $portalSet->id)->count(),
        'contribution' => (float) Contribution::whereIn('group_id', $groupIds)->sum('amount'),
        'groupMember' => GroupMember::whereIn('group_id', $groupIds)->count(),
        'portalSet' => $portalSet,
        'weeklyContributions' => [],
        'weeklyRevenue' => [],
        'weekLabels' => [],
        'activeMembers' => GroupMember::whereIn('group_id', $groupIds)->where('is_active', true)->count(),
        'inactiveMembers' => GroupMember::whereIn('group_id', $groupIds)->where('is_active', false)->count(),
        'pendingMembers' => GroupMember::whereIn('group_id', $groupIds)->where('has_recived', false)->count(),
        'groupPerformance' => [],
        'recentActivities' => collect(),
        'latestLeader' => Group::latest()->first()
    ];
}

private function returnSafeData($portalSet = null)
{
    return view('admin.dashboard.index', [
        'groupCount' => 0,
        'contribution' => 0.0,
        'groupMember' => 0,
        'portalSet' => $portalSet,
        'weeklyContributions' => [],
        'weeklyRevenue' => [],
        'weekLabels' => [],
        'activeMembers' => 0,
        'inactiveMembers' => 0,
        'pendingMembers' => 0,
        'groupPerformance' => [],
        'recentActivities' => collect(),
        'latestLeader' => null
    ]);
}
    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }
    public function helpSupport()
    {
        $helpSupport = HelpSupport::first();
        return view('admin.dashboard.help_support', compact('helpSupport'));
    }

    public function helpSupportStore(Request $request)
    {

        try {
            // Validate the incoming request
            $validator = Validator::make($request->all(), [
                'support_email' => 'required|email|max:255',
                'support_phone' => 'required|string|max:20',
                'support_days' => 'required|string|max:100',
                'support_start_time' => 'required|date_format:H:i',
                'support_end_time' => 'required|date_format:H:i|after:support_start_time',
            ], [
                'support_email.required' => 'Support email address is required',
                'support_email.email' => 'Please enter a valid email address',
                'support_phone.required' => 'Support phone number is required',
                'support_days.required' => 'Please specify support available days',
                'support_start_time.required' => 'Support start time is required',
                'support_end_time.required' => 'Support end time is required',
                'support_end_time.after' => 'End time must be after start time',
            ]);

            if ($validator->fails()) {
                return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput()
                    ->with('error', 'Please fix the errors below.');
            }

            // Use transaction for data consistency
            DB::transaction(function () use ($request) {
                // Check if support settings already exist
                $supportSetting = HelpSupport::first();
                $time = $request->support_start_time . ' - ' . $request->support_end_time;

                if ($supportSetting) {
                    // Update existing settings
                    $supportSetting->update([
                        'email' => $request->support_email,
                        'phone' => $request->support_phone,
                        'day' => $request->support_days,
                        'time' => $time,
                    ]);
                } else {
                    // Create new settings
                    HelpSupport::create([
                        'email' => $request->support_email,
                        'phone' => $request->support_phone,
                        'day' => $request->support_days,
                        'time' => $time,
                    ]);
                }
            });


            return redirect()
                ->back()
                ->with('success', 'Support settings updated successfully!');

        } catch (\Exception $e) {
            \Log::error('Support settings update failed: ' . $e->getMessage());

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Failed to update support settings. Please try again.');
        }
    }

    public function leaderAccDetails($leader_id)  {

        $leader = User::where('id', $leader_id)->first();
        $bankAccount = LeaderBankdetails::where('leader_id',$leader_id)->first();

        return view('admin.users.bankDetails' , compact('leader' , 'bankAccount'));
    }
}
