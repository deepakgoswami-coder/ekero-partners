<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Auth;
use App\Models\Group;
use App\Models\GroupChat;
use App\Models\GroupMember;
use App\Models\PortalSet;
use App\Models\User;
use App\Models\Contribution;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GroupController extends Controller
{

    public function group()
    {
        $groupIds = GroupMember::where('user_id', auth()->user()->id)->pluck('group_id');
        $group = Group::whereIn('id', $groupIds)->latest()->paginate(10);
        return view('user.group.index', compact('group'));
    }

    public function groupDetails()
    {
        $user = Auth::user(); 
        
        // value() se direct ID milegi, agar nahi hogi toh null aayega
        $groupId = GroupMember::where('user_id', $user->id)->value('group_id');
        
        // Sab variables ko default empty values de dein
        $groupMembers = collect();
        $group = null;
        $portal = null;
        $leader = null;
        $contributions = collect();
        $weeklyCommitment = 0;
        $groupShare = 0;
        $totalInvestment = 0;
        $currentWeek = 1;
        $totalWeeks = 0;
        $remainingWeeks = 0;

        // Sirf tabhi queries chalein jab groupId mil jaye
        if ($groupId) {
            $groupMembers = GroupMember::where('group_id', $groupId)->with('user')->get();
            $group = Group::find($groupId);
            
            if ($group) {
                $portal = PortalSet::find($group->portal_set_id);
                $leader = User::find($group->leader_id);
                
                if ($portal && $portal->start_date && $portal->end_date) {
                    $currentWeek = typeof('WeekCount') == 'function' ? WeekCount($portal->start_date) : 1;
                    $start = \Carbon\Carbon::parse($portal->start_date)->startOfDay();
                    $end = \Carbon\Carbon::parse($portal->end_date)->startOfDay();
                    $totalWeeks = floor(($start->diffInDays($end) + 1) / 7);
                    $remainingWeeks = max(0, $totalWeeks - $currentWeek);
                }
            }

            $contributions = Contribution::where('user_id', $user->id)->latest()->get();
            $totalInvestment = $contributions->sum('amount');

            $userGroupMember = GroupMember::where('user_id', $user->id)
                                ->where('group_id', $groupId)
                                ->first();
                                
            $weeklyCommitment = $userGroupMember->weekly_commitment ?? 0;
            $groupShare = $userGroupMember->group_share ?? 0;
        }

        // Page load ho jayega bina kisi error ke, bhale hi data empty ho
        return view('user.group.details', compact(
            "user", "group", "portal", "leader", "groupMembers", 
            "contributions", "weeklyCommitment", "groupShare", 
            "totalInvestment", "currentWeek", "remainingWeeks"
        ));
    }

     public function groupMember()
    {
        // value() use karne se direct ID (integer/string) milegi
        $groupId = GroupMember::where('user_id', auth()->id())->value('group_id');

        // Ab $groupId ya toh ID hogi ya null, query crash nahi hogi
        $groupMembers = GroupMember::where('group_id', $groupId)->get();

        return view('user.group.groupmember', compact('groupMembers'));
    }

    // public function groupDetails(){
    //     return view('user.group.details');
    // }
    public function index(Group $group)
    {
        // check if user is member
        $isMember = $group->members()->where('user_id', Auth::id())->exists();
        if (!$isMember) {
            abort(403, 'You are not a member of this group');
        }

        return view('user.chat', compact('group'));
    }

    public function store(Request $request, Group $group)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $isMember = $group->members()->where('user_id', Auth::id())->exists();
        if (!$isMember) {
            return response()->json(['error' => 'You are not a member of this group'], 403);
        }

        $chat = GroupChat::create([
            'group_id' => $group->id,
            'user_id' => Auth::id(),
            'message' => $request->message,
        ]);

        return response()->json($chat);
    }

    public function messages(Group $group)
    {
        $isMember = $group->members()->where('user_id', Auth::id())->exists();
        if (!$isMember) {
            return response()->json(['error' => 'You are not a member of this group'], 403);
        }

        $chats = $group->chats()->with('user')->take(50)->get();
        return response()->json($chats);
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/user/login');
    }

}
