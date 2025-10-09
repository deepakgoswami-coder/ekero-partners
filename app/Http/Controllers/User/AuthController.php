<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpEmail;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function register(){
        return view("user.register");
    }

    public function registerStore(StoreUserRequest $request){
       
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email; 
        $user->password = Hash::make($request->password);
        $user->role = 3; // User role
        $user->save();

        return redirect()->route('user.login')->with('success','Registration successful. Please login.');    
    }
    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
        ]);

        // $emailOtp = rand(000000, 999999);
        $emailOtp = "123456";
        $request->session()->put('new_email', $request->email);
        $request->session()->put('new_otp', $emailOtp);

        // Store OTP in session (or database)
        Session::put('otp_for_' . $request->email, $emailOtp);
        Session::put('otp_expires_' . $request->email, now()->addMinutes(5));
 
        Mail::to($request->email)->send(new OtpEmail($emailOtp));
 

        return response()->json(['message' => 'OTP sent to your email address!']);
    }

    public function verifyOtp(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|min:4|max:6',
        ]);

        $storedOtp = Session::get('otp_for_' . $request->email);
        $expiry = Session::get('otp_expires_' . $request->email);

        if (!$storedOtp) {
            return response()->json([
                'status' => false,
                'message' => 'No OTP found. Please request a new one.'
            ], 422);
        }

        if (now()->greaterThan($expiry)) {
            return response()->json([
                'status' => false,
                'message' => 'OTP expired. Please request a new one.'
            ], 422);
        }

        if ($request->otp != $storedOtp) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid OTP. Please try again.'
            ], 422);
        }

        // OTP is correct → remove it from session
        Session::forget('otp_for_' . $request->email);
        Session::forget('otp_expires_' . $request->email);

        return response()->json([
            'status' => true,
            'message' => 'OTP verified successfully!'
        ]);
    }
    public function login(){
        return view("user.login");
    }

    public function loginStore(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['email' => 'The provided credentials do not match our records.'])->withInput();
        }

        auth()->login($user);

        return redirect()->route('user.dashboard');
        
    }



}

