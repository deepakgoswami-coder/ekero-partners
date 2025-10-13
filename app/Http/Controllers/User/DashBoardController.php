<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Group;
use App\Models\GroupMember;
use App\Models\PortalSet;
use App\Models\Leader;
use App\Models\User;
use App\Models\Contribution;



class DashBoardController extends Controller
{
    public function dashboard(){
        $user = Auth::user();
        return view("user.dashboard" , compact("user"));
    }

    public function userProfile(Request $request){
        $user = Auth::user();
        return view("user.profile" , compact("user"));
    }

    public function userUpdateProfile(Request $request) {
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

        return redirect()->route("user.dashboard")->with('success','Profile Updated successsfully');     

    }

    public function myContribution() {
        $user = Auth::user();
        $groupId = GroupMember::where('user_id',$user->id)->pluck('group_id');
        $group = Group::where('id',$groupId)->first();
        $groupMembers = GroupMember::where('group_id',$groupId)->get();
        $portal = PortalSet::where('id', $group->portal_set_id)->first();
        $leader = User::where('id', $group->leader_id)->first();
        $contributions = Contribution::where('user_id', $user->id)->latest()->get();
        $weeklyCommitment = GroupMember::where('user_id', $user->id)->first()->weekly_commitment;

        return view('user.contribution', compact('user',"group" , "portal", "leader" , "groupMembers" , "contributions",'weeklyCommitment'));
    }

    public function myContributionPay(Request $request) {
        dd($request->all());
    }

        
    


}
