<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\GroupChat;
use App\Models\GroupMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    public function group()
    {
        $groupIds = GroupMember::where('user_id', auth()->user()->id)->pluck('group_id');
        $group = Group::whereIn('id', $groupIds)->latest()->paginate(10);
        return view('user.group.index',compact('group'));
    }
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
}
