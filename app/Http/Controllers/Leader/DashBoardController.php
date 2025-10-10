<?php

namespace App\Http\Controllers\Leader;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\GroupMember;
use App\Models\PortalSet;
use App\Models\User;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{

    public function dashboard(){
        return view("leader.dashboard");
    }
    public function group(){
        $groups = Group::where('leader_id',auth()->user()->id)->latest()->paginate(10);
        $member = User::where('role',3)->latest()->get();
        return view('leader.group.index',compact('groups','member'));
    }
    public function groupCreate(){
            $leader = User::where('role',2)->where('status',1)->latest()->get();
        $portalSets  = PortalSet::where('is_active',1)->latest()->get();
        return view("leader.group.create",compact('leader','portalSets'));
    
    }
    public function assignMembers(Request $request){
          $groupMember = GroupMember::where('group_id',$request->group_id)->where('user_id',$request->user_id)->first();
            if ($groupMember) {
            return redirect()->back()->with('error','Member alredy assign in this group');
            }
    
            $groupMember = new GroupMember();
            $groupMember->user_id = $request->user_id;
            $groupMember->group_id = $request->group_id;
            $groupMember->weekly_commitment = $request->weekly_commitment;
            $groupMember->save();
            return redirect()->back()->with('success','Member  assign successfully');
           
    }
    public function groupMember($id){
        $group = Group::findOrFail($id);
      $groupMember = GroupMember::where('group_id',$id)->latest()->paginate(10);
        return view("leader.group.assign-member",compact('groupMember','group'));

    }
}
