<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CoachJobApplication;
use App\Models\User;
use App\Models\ChatMessage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Mail\CoachCredentialsMail;
use App\Mail\ApplicationSubmitted;
use Illuminate\Support\Facades\Mail;



class CoachController extends Controller
{
    
    public function index11(Request $request) {

        return redirect()->back()
            ->with('success', 'Your application has been submitted successfully.')
            ->withFragment('coachform');

    }

    // STORE _ APPLICATION to submit the user application  for coach
     public function index(Request $request)
    {
        // ✅ 1. Validate request
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'mobile'  => 'required|string|min:8|max:20',
            'message' => 'nullable|string|max:1000',
            'cv'      => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);
        $existing = CoachJobApplication::where('email', $request->email)->first();

        if ($existing) {
            if($existing->status == 'selected'){
                return redirect()->back()
                ->with('success', 'Your application current status is '. $existing->status .', Check your email for login details.')
                ->withFragment('coachform');
            }else{
                return redirect()->back()
                ->with('success', 'Your application current status is '. $existing->status .' .')
                ->withFragment('coachform');
            }
        }


        // ✅ 2. Upload CV
        $cvPath = null;
        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('coach_applications', 'public');
        }


        // ✅ 3. Create job application
        $application =  CoachJobApplication::create([
            'full_name'       => $validated['name'],
            'email'           => $validated['email'],
            'mobile'          => $validated['mobile'],
            'about_candidate' => $validated['message'] ?? null,
            'cv_path'         => $cvPath,
            'applied_ip'      => $request->ip(),
            'status'          => 'pending',
        ]);

        // sending the mail to the email id ---
        Mail::to($request->email)
            ->send(new ApplicationSubmitted($application));


        // ✅ 4. Response
        return redirect()->back()
            ->with('success', 'Your application has been submitted successfully, Check Email.')
            ->withFragment('coachform');

    }         

    public function applicationList() {

        // $applications = CoachJobApplication::orderBy('created_at', 'asc')->paginate(10); // 10 records per page
        $applications = CoachJobApplication::orderByRaw(
                "CASE WHEN status = 'shortlisted' THEN 0 ELSE 1 END"
            )
            ->orderBy('created_at', 'asc')
            ->paginate(10);

        $totalApplicationcount = $applications->count();
        $shortlisted = $shortlistedCount = CoachJobApplication::where('status', 'shortlisted')->count();
        $coachCount = User::where('role',4)->count();

        return view('admin.coach.application.formlist', compact('applications' , 'totalApplicationcount', 'coachCount' , 'shortlisted'));
    }

    public function applicationReview(Request $request) {
        $application = CoachJobApplication::where('id', $request->application_id)->first();
        if($application->status == "pending") {
            $application->status = "reviewed";
            $application->save();
        }
        return view('admin.coach.application.appliReview' , compact('application'));
    }

    // application delete ---------
    public function applicationDelete(Request $request){
        
         // ✅ Validate application_id
        $request->validate([
            'application_id' => 'required|exists:coach_job_applications,id', 
        ]);

        // ✅ Fetch application
        $application = CoachJobApplication::find($request->application_id);
        // ✅ Optional: Delete CV file if exists
        if ($application->cv_path && Storage::disk('public')->exists($application->cv_path)  && $application->status != 'shortlisted') {
                Storage::disk('public')->delete($application->cv_path);
            }

        // ✅ Delete record
        $application->delete();

        return redirect()
        ->route('coach.applicationList')
        ->with('success', 'Application deleted successfully.');
    }

    //reject the application 
    public function applicationReject(Request $request){
        
         // ✅ Validate application_id
        $request->validate([
            'application_id' => 'required|exists:coach_job_applications,id', 
        ]);

        // ✅ Fetch application
        $application = CoachJobApplication::find($request->application_id);


        // ✅ change status
        $application->status = "rejected";
        $application->save();

        return redirect()
        ->route('coach.applicationList')
        ->with('success', 'Application Rejected successfully.');
    }

    //accept the application 
    public function applicationAccept(Request $request){
        
         // ✅ Validate application_id
        $request->validate([
            'application_id' => 'required|exists:coach_job_applications,id', 
        ]);

        // ✅ Fetch application
        $application = CoachJobApplication::find($request->application_id);


        // ✅ change status
        $application->status = "shortlisted";
        $application->save();

        return redirect()
        ->route('coach.applicationList')
        ->with('success', 'Application Shortlisted successfully.');
    }

    // make coach function---- 
    public function makeCoach(Request $request) {
          
         // ✅ Validate application_id
        $request->validate([
            'application_id' => 'required|exists:coach_job_applications,id', 
        ]);

        // ✅ Fetch application
        $application = CoachJobApplication::find($request->application_id);
        $user = User::where('role' , 4)->first();
        // $teamLeaders = User::where('role' , 2)->get();

        return view('admin.coach.application.makeCoach', compact('application' , 'user'));
    }

    // make coach store ----
    public function makeCoachStore(Request $request)
    {

         $request->validate([
            'application_id' => 'required|exists:coach_job_applications,id',
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'password' => 'required|min:8|confirmed',
            ]);     

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password_confirmation),
            'textPassword' => $request->password_confirmation,
            'role' => '4',
            'status' => '1',
            'address' => $request->address,
            'cv_path' => $request->cv_path,
        ]);

        CoachJobApplication::where('id', $request->application_id)
            ->update([
                'status' => 'selected',
                'reviewed_at' => now()
            ]);

            // sending mail with credentials...
        Mail::to($user->email)->send(
            new CoachCredentialsMail($user, $user->textPassword)
        );

        return redirect()
            ->route('admin.coach.list')
            ->with('success', 'Coach created & emailed credential successfully .');
            
    }
    
    // coach listing for fun
    public function coachListing(){

        $coachesCount = User::selectRaw("
                        COUNT(*) as total,
                        SUM(CASE WHEN status = 1 THEN 1 ELSE 0 END) as active,
                        SUM(CASE WHEN status = 0 THEN 1 ELSE 0 END) as inactive
                    ")
                    ->where('role', 4)
                    ->first();
        $coaches = User::where('role', 4)
            ->orderBy('created_at', 'asc')
            ->paginate(10);
        
        return view('admin.coach.management.coachlisting' , compact('coaches', 'coachesCount'));
    }

    // need to handle the forgain key constains--
    public function coachDelete(Request $request) {

        $request->validate([
            'coach_id' => 'required|exists:users,id', 
        ]);
       
        // ✅ Fetch coach details and application 
        $coach = User::find($request->coach_id);
        $application = CoachJobApplication::where('email' , $coach->email)->first();

        // application status changing to revied
        if($application){
            $application->status = 'reviewed';
            $application->save();
        }

        // leder assign coach id making null 
        $leaderIds = json_decode($coach->assign_leader, true);

        if (is_array($leaderIds) && count($leaderIds) > 0) {
            User::whereIn('id', $leaderIds)
                ->update([
                    'assigned_coach_id' => null
                ]);
        }

        // ✅ Optional: Delete CV file if exists
        // if ($coach->cv_path && Storage::disk('public')->exists($coach->cv_path)) {
        //         Storage::disk('public')->delete($coach->cv_path);
        //     }

        
        // ✅ Delete record
        $coach->delete();

        return redirect()
        ->route('admin.coach.list')
        ->with('success', 'Coach deleted successfully.');
 
    }


    //function for review the coach profile
    public function coachReview(Request $request){
            $request->validate([
            'coach_id' => 'required|exists:users,id', 
        ]);

        // ✅ Fetch application
        $coach = User::find($request->coach_id);
        $leaders = User::where('role', 2)
    ->whereNull('assigned_coach_id')
    ->get();

        return view('admin.coach.management.coachreview', compact('coach' , 'leaders'));
    }

    public function coachUpdate(Request $request) {
        $request->validate([
            'coach_id' => 'required|exists:users,id',

            'name' => 'required|string|min:3|max:255',

            'email' => 'required|email|unique:users,email,' . $request->coach_id,

            'phone' => 'required|string|unique:users,phone,' . $request->coach_id,

            'password' => 'required|string|min:8',
            'status'  => 'required',
        ]);

      
        DB::beginTransaction();

        try {

            $coach = User::findOrFail($request->coach_id);
            // 1️⃣ Update NAME if changed
            if ($request->name !== $coach->name) {
                $coach->name = $request->name;
            }

            // 2️⃣ Update PASSWORD if changed
            if (!empty($request->password) && $request->password !== $coach->textPassword) {
                $coach->password     = bcrypt($request->password);
                $coach->textPassword = $request->password; // ⚠️ optional (not recommended)
            }

            // 3️⃣ Assign leaders (merge old + new)
            $existingLeaders = $coach->assign_leader ?? [];

            if (!is_array($existingLeaders)) {
                $existingLeaders = json_decode($existingLeaders, true) ?? [];
            }

            $newLeaders = $request->leader_ids ?? [];

            // merge + remove duplicates
            $finalLeaders = array_values(array_unique(array_merge($existingLeaders, $newLeaders)));

            $coach->assign_leader = $finalLeaders;

            /* ===============================
            4️⃣ Update leaders → assigned_coach_id
            ================================*/
            User::whereIn('id', $finalLeaders)
                ->where('role', 2)
                ->update([
                    'assigned_coach_id' => $coach->id
                ]);

            /* ===============================
            5️⃣ Update other fields
            ================================*/
            // $coach->email = $request->email;
            // $coach->phone = $request->phone;
            $coach->status = $request->status;
            $coach->save();

            DB::commit();

            return redirect()->route('admin.coach.list')->with('success', 'Coach updated successfully');

        } catch (\Exception $e) {

            DB::rollBack();

            return redirect()->route('admin.coach.list')->with('success', 'error', $e->getMessage());
            // return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function coachLeaders($coachId) {
        
        $coachId = decrypt($coachId);
        $coach = User::find($coachId);


        $leaderIds = json_decode($coach->assign_leader, true) ?? [];

        $leaders = User::where('role', 2)
            ->whereIn('id', $leaderIds)
            ->paginate(10); // ✅ pagination

        $leadersQuery = User::where('role', 2)
            ->whereIn('id', $leaderIds);

        $totalLeaders   = (clone $leadersQuery)->count();
        $activeLeaders  = (clone $leadersQuery)->where('status', 1)->count();
        $inactiveLeaders = (clone $leadersQuery)->where('status', 0)->count();

        return view('admin.coach.management.coach_leaders', compact('coach','leaders','totalLeaders','activeLeaders','inactiveLeaders'));

    
    
    }

    // chat to show admin what the leader and coach talked about 
    public function coachLeaderChat($coachId , $leaderId){
        // decrpt the id
        $coachId = decrypt($coachId);
        $leaderId = decrypt($leaderId);
        // dd($coachId , $leaderId);
        // Optional: validate users exist
            $coach  = User::findOrFail($coachId);
            $leader = User::findOrFail($leaderId);

            // Fetch all chats between coach & leader (both directions)
            $messages = ChatMessage::where(function ($q) use ($coachId, $leaderId) {
                    $q->where('sender_id', $coachId)
                    ->where('receiver_id', $leaderId);
                })
                ->orWhere(function ($q) use ($coachId, $leaderId) {
                    $q->where('sender_id', $leaderId)
                    ->where('receiver_id', $coachId);
                })
                ->orderBy('created_at', 'asc')
                ->get();

                // dd($messages , $coach , $leader);
            return view('admin.coach.management.coach_leaderChat' , compact(
                'messages',
                'coach',
                'leader'));

            return view('admin.dashboard.overallChat', compact(
                'messages',
                'coach',
                'leader'
            ));


      
    }






}
