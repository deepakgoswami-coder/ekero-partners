<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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


}
