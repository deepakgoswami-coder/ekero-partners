<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\GroupMember;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function group()
    {
        $groupIds = GroupMember::where('user_id', auth()->user()->id)->pluck('group_id');
        $group = Group::whereIn('id', $groupIds)->latest()->paginate(10);
        return view('user.group.index',compact('group'));
    }

    public function groupMember(){
        $groupId = GroupMember::where('user_id', auth()->user()->id)->pluck('group_id');
        $groupMembers = GroupMember::where('group_id', $groupId)->get();

        return view('user.group.groupmember',compact('groupMembers'));
    }

    public function groupDetails(){
        return view('user.group.details');
    }


}
