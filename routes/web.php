<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LeaderController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\PortalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\GroupController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Leader\AuthController as LeaderAuthController;
use App\Http\Controllers\Leader\DashBoardController as LeaderDashBoardController;
use App\Http\Controllers\User\AuthController as UserAuthController;
use App\Http\Controllers\User\DashBoardController as UserDashBoardController;
use App\Http\Controllers\WebSiteController;
use App\Http\Controllers\Admin\CoachController as AdminCoachController;
use App\Http\Controllers\Coach\DashBoardController as CoachDashBoardController;
use App\Http\Controllers\Coach\AuthController as CoachAuthController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/migrate', function () {
    try {
        // Migration command run karne ke liye
        // '--force' isliye zaroori hai kyunki production mode mein Laravel confirmation maangta hai
        Artisan::call('migrate', [
            '--force' => true
        ]);

        $output = Artisan::output(); // Command ka result store karega
        return "<h1>Migration Successful!</h1><pre>" . $output . "</pre>";
        
    } catch (\Exception $e) {
        return "Error occurred: " . $e->getMessage();
    }
});

Route::get('/', function () {
    return redirect('/en');
});

// Group of localized routes
Route::group([
    'prefix' => '{lang}',
    'where' => ['lang' => 'en|ar|fr|de|ko|ja|it|es'],
      'middleware' => ['track.session', 'setlocale'],
    
], function () {

  Route::get('/', [WebSiteController::class, 'home'])->name('website.home');
  Route::get('/home', [WebSiteController::class, 'home'])->name('website.home');
  Route::get('/about-Us', [WebSiteController::class, 'aboutUs'])->name('website.about');
  Route::get('/contact', [WebSiteController::class, 'contact'])->name('website.contact');
  Route::get('/entrepreneur', [WebSiteController::class, 'entrepreneur'])->name('website.entrepreneur');
  Route::get('/coach', [WebSiteController::class, 'coach'])->name('website.coach');
  Route::get('/terms', [WebSiteController::class, 'terms'])->name('website.terms');
  Route::get('/privacy-policy', [WebSiteController::class, 'privacyPolicy'])->name('website.privacy.policy');
    
    // Add more localized routes here if needed
    // Route::get('/about', ...)->name('website.about');
});
  Route::get('/contact-form', [WebSiteController::class, 'contactUsStore'])->name('website.contact.query');
  // route for coach job application---
  Route::post('/coach-application',[AdminCoachController::class, 'index'])->name('website.coach.application');

// Route::middleware(['track.session'])->group(function () {
//   Route::get('/', [WebSiteController::class, 'home'])->name('website.home');
//   Route::get('/home', [WebSiteController::class, 'home'])->name('website.home');
//   Route::get('/about-Us', [WebSiteController::class, 'aboutUs'])->name('website.about');
//   Route::get('/contact', [WebSiteController::class, 'contact'])->name('website.contact');
//   Route::get('/entrepreneur', [WebSiteController::class, 'entrepreneur'])->name('website.entrepreneur');
//   Route::get('/terms', [WebSiteController::class, 'terms'])->name('website.terms');
// });
Route::middleware(['session.check'])->group(function () {
    Route::get('admin/login', [AuthController::class, 'loginGet'])->name('admin.login');
    Route::prefix('leader')->group(function () {    
        Route::get('/login', [LeaderAuthController::class, 'login'])->name('leader.login');
        Route::get('/register', [LeaderAuthController::class, 'register'])->name('leader.register');

    });
    Route::get('coach/login', [CoachAuthController::class, 'login'])->name('coach.login');

    Route::prefix('user')->group(function () {
        Route::get('/login', [UserAuthController::class, 'login'])->name('user.login');
    });
   
});

// Route for the user login to web page
// Route::get('/', [UserAuthController::class, 'register'])->name('user.register');
    Route::get('/test', [AdminController::class, 'checkout'])->name('admin.stripe.checkout');
Route::post('/session', [AdminController::class, 'session'])->name('admin.stripe.session');
Route::get('/success', [UserDashBoardController::class, 'stripeSuccess'])->name('admin.stripe.success');
Route::get('/cancel', [UserDashBoardController::class, 'stripeCancel'])->name('admin.stripe.cancel');
// Route::get('/run-migration', [UserDashBoardController::class, 'migration']);

// All Routes for the admin(role - 1) -------------------------------------------------------------

Route::post('admin/login', [AuthController::class, 'login'])->name('login');
Route::get('/admin', [AuthController::class, 'loginGet']);

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
  Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');
  Route::resource('portal', PortalController::class, );
  Route::resource('groups', AdminController::class, );
  Route::resource('leader', LeaderController::class, );
  Route::resource('member', MemberController::class, );
  Route::get('/group/assign/{id}', [AdminController::class, 'assignMember'])->name('groups.assign.member');
  Route::get('/group/link/{id}', [LeaderController::class, 'groupLink'])->name('user.group.link');
  Route::get('/group/links/{id}', [MemberController::class, 'groupLink'])->name('member.group.link');
  Route::post('/group/member', [AdminController::class, 'assignMemberAdd'])->name('group.member.assign');
  Route::post('/leader/toggle-status', [LeaderController::class, 'toggleStatus'])->name('leader.toggle_user_status');
  Route::post('/leader/toggle-statuss', [MemberController::class, 'toggleStatus'])->name('member.toggle_user_status');
  Route::post('/view-all/notification', [MemberController::class, 'viewAllNotification'])->name('notifications.markAllRead');
  Route::get('/contribution/list', [MemberController::class, 'contributionList'])->name('contribution.list');
  Route::get('/contribution-list/{id}', [MemberController::class, 'contributionListByID'])->name('contribution.listt');
  Route::post('/contribution/status', [MemberController::class, 'contributionStatus'])->name('contribution.status');
  Route::post('/proceed/payment', [MemberController::class, 'proceedPayment'])->name('proceed.payment');
  // route for help and support
  Route::get('/help-support', [DashboardController::class, 'helpSupport'])->name('admin.help.support');
  Route::post('/support-settings', [DashBoardController::class, 'helpSupportStore'])->name('admin.support.settings.update');

  Route::get('/bank-details',[DashboardController::class , 'leaderAccDetailsPage'])->name('admin.account.details');
  Route::get('/bank-details{leader_id}',[DashboardController::class , 'leaderAccDetails'])->name('admin.account.details');
  
  Route::get('/overall-chat',[DashboardController::class , 'overAllChat'])->name('admin.overall.chat');

  // to delete the user from any group ------------\
  Route::post('/users-destroy',[MemberController::class , 'userDestroy'])->name('admin.users.destroy');

  // to create coach routes-----
  Route::get('/coachapplication/list',[AdminCoachController::class , 'applicationList'])->name('coach.applicationList');
 
  Route::get('/coachapplication/review',[AdminCoachController::class , 'applicationList'])->name('coach.application.review');  
  Route::post('/coachapplication/review',[AdminCoachController::class , 'applicationReview'])->name('coach.application.review');  
  
  Route::delete('/coachapplication/delete',[AdminCoachController::class , 'applicationDelete'])->name('coach.application.delete');
  
  Route::get('/coachapplication/reject',[AdminCoachController::class , 'applicationList'])->name('coach.application.reject');
  Route::post('/coachapplication/reject',[AdminCoachController::class , 'applicationReject'])->name('coach.application.reject');
  
  Route::get('/coachapplication/accept',[AdminCoachController::class , 'applicationList'])->name('coach.application.accept');
  Route::post('/coachapplication/accept',[AdminCoachController::class , 'applicationAccept'])->name('coach.application.accept');
  Route::get('/coachapplication/make-coach',[AdminCoachController::class , 'makeCoach'])->name('coach.application.makeCoach');
  Route::post('/coachapplication/make-coach',[AdminCoachController::class , 'makeCoach'])->name('coach.application.makeCoach');
  Route::post('/coachapplication/make-coach-store',[AdminCoachController::class , 'makeCoachStore'])->name('coach.application.makeCoachStore');

 // to managae caoch routes-----
  Route::get('/coach-list' , [AdminCoachController::class , 'coachListing'])->name('admin.coach.list');
  Route::get('/coach-delete' , [AdminCoachController::class , 'coachDelete'])->name('admin.coach.delete');
  Route::get('/coach-review' , [AdminCoachController::class , 'coachReview'])->name('admin.coach.review');
  Route::post('/coach-update' , [AdminCoachController::class , 'coachUpdate'])->name('admin.coach.update');
  Route::get('/coach-leaders/{coachId}' , [AdminCoachController::class , 'coachLeaders'])->name('admin.coach.leaders');
  // coach leader chat ..
  Route::get('/chat-access/{coachId}/{leaderId}', [AdminCoachController::class , 'coachLeaderChat'])->name('admin.coach.chat.access');

});

// All routes for the leader(role - 2) -------------------------------------------------------------
Route::prefix('leader')->group(function () {
  // register and login Routes for leader
  Route::post('/register', [LeaderAuthController::class, 'registerStore'])->name('register.store');
  Route::post('/send-otp', [LeaderAuthController::class, 'sendOtp'])->name('leader.send.otp');
  Route::post('/verify-otp', [LeaderAuthController::class, 'verifyOtp'])->name('leader.verify.otp');
  Route::post('/login', [LeaderAuthController::class, 'loginStore'])->name('leader.login.store');
  Route::get('/forget-password', [LeaderAuthController::class, 'forgetPass'])->name('leader.forget.password');
  Route::post('/send-otp-password', [LeaderAuthController::class, 'sendOtpPassword'])->name('leader.send.otp.pass');
  Route::post('/forget-password', [LeaderAuthController::class, 'forgetPassStore'])->name('leader.forget.password.store');

  Route::get('/xyz', [LeaderDashBoardController::class, 'xyz'])->name('leader.xyz');

  // middle ware applied routes for the leader
  Route::middleware('leader')->group(function () {
    Route::get('/dashboard', [LeaderDashBoardController::class, 'dashboard'])->name('leader.dashboard');
    Route::get('/group', [LeaderDashBoardController::class, 'group'])->name('leader.group');
    Route::get('/group/assign/{id}', [LeaderDashBoardController::class, 'assignMember'])->name('leader.groups.assign.member');
    Route::get('/group/create', [LeaderDashBoardController::class, 'groupCreate'])->name('leader.groups.create');
    Route::post('/group/assign/member', [LeaderDashBoardController::class, 'assignMembers'])->name('leader.group.member.assign');
    Route::get('/group/member/{id}', [LeaderDashBoardController::class, 'groupMember'])->name('leader.groups.member');
    Route::delete('/portal/{portal}/member/{user}', [LeaderDashBoardController::class, 'destroyMember'])->name('portal.members.remove');
    Route::get('/group/member/details/{id}', [LeaderDashBoardController::class, 'memberDetails'])->name('leader.member.details');
    Route::get('/update/profile', [LeaderDashBoardController::class, 'leaderUpdateProfile'])->name('leader.update.profile');
    Route::post('/update/profile', [LeaderDashBoardController::class, 'leaderProfile'])->name('leader.update.profilePost');
    Route::get('/group/edit/{id}', [LeaderDashBoardController::class, 'editGroup'])->name('leader.groups.edit');
    Route::put('/group/update/{id}', [LeaderDashBoardController::class, 'updateGroup'])->name('leader.groups.update');
    Route::get('/contribution', [LeaderDashBoardController::class, 'contribution'])->name('leader.contribution');
    Route::post('/real-all', [LeaderDashBoardController::class, 'readAllNotification'])->name('leader.notifications.markAllRead');
  Route::get('/contribution/list/{id}', [LeaderDashBoardController::class, 'contributionList'])->name('leader.contribution.list');
  Route::post('/contribution/status', [MemberController::class, 'contributionStatus'])->name('leader.contribution.status');

  // for bank details to admin
  Route::get("bank-details", [LeaderDashBoardController::class, 'bankDetails'])->name('leader.bank.details');
  Route::post("bank-details", [LeaderDashBoardController::class, 'bankDetailsStore'])->name('leader.bank.details');
  Route::get('/logout', [MemberController::class, 'logout'])->name('leader.logout');

  // leaders personal user portal routes 

  Route::get('user-portal',[LeaderDashBoardController::class , 'myUserPortal'])->name('leader.user.portal');
  Route::post('user-portal',[LeaderDashBoardController::class , 'myUserPortalStore'])->name('leader.user.portal.store');
  Route::get('coach-chat-list',[LeaderDashBoardController::class , 'coachChatList'])->name('leader.coach.chat.list');
  Route::post('/send-coach-message', [LeaderDashBoardController::class, 'sendMessage'])->name('leader.coach.send.message');

  Route::prefix('calendar')->group(function () {    
    Route::get('/', [LeaderDashBoardController::class, 'calender'])->name('leader.calender.index');
    Route::post('/store', [LeaderDashBoardController::class, 'storeTask'])->name('leader.calendar.store');
  });
  });
});

// All routes for the user(role - 3) -------------------------------------------------
Route::prefix('user')->group(function () {
    // register and login Routes for user
    Route::get('/register/{id?}', [UserAuthController::class, 'register'])->name('user.register');
    Route::post('/register', [UserAuthController::class, 'registerStore'])->name('user.store');
    Route::post('/send-otp', [UserAuthController::class, 'sendOtp'])->name('user.send.otp');
    Route::post('/verify-otp', [UserAuthController::class, 'verifyOtp'])->name('user.verify.otp');
    Route::post('/login', [UserAuthController::class, 'loginStore'])->name('user.login.store');
    Route::post('/send-otp-password', [UserAuthController::class, 'sendOtpPassword'])->name('user.send.otp.pass');
    Route::get('/forget-password',[UserAuthController::class,'forgetPass'])->name('user.forget.password');
    Route::post('/forget-password',[UserAuthController::class,'forgetPassStore'])->name('user.forget.password.store');
    
    // middle ware applied routes for the user
    Route::middleware('user')->group(function () {
      Route::get('/dashboard', [UserDashBoardController::class, 'dashboard'])->name('user.dashboard');
      Route::get('/profile', [UserDashBoardController::class, 'userProfile'])->name('user.profile');
      Route::post('/profile', [UserDashBoardController::class, 'userUpdateProfile'])->name('user.update.profile');
      Route::post('/read-all', [UserDashBoardController::class, 'readAllNotification'])->name('user.notifications.markAllRead');


      // Group & Details routes
      Route::get('/group', [GroupController::class, 'group'])->name('user.group');
      Route::get('/contribution', [GroupController::class, 'group'])->name('user.group.contribution');
      Route::get('/group-details', [GroupController::class, 'groupDetails'])->name('user.group.details');
      Route::get('/group-member', [GroupController::class,'groupMember'])->name('user.group.member');

      // contribution & payment
      Route::get('/my-contribution',[UserDashBoardController::class,'myContribution'])->name('user.my.contribution');
      Route::post('/my-contribution/payment',[UserDashBoardController::class,'myContributionPay'])->name('user.my.contribution.pay');
      Route::get('/payment-reciept',[UserDashBoardController::class,'PaymentRecieptDownload'])->name('user.payment.reciept');

      // chart and analytics
      Route::get('/contribution-trends', [UserDashBoardController::class, 'getContributionTrends'])->name('user.contribution-trends');

   
      // group char for user
      Route::get('groups/{group}/chat', [GroupController::class, 'index'])->name('user.groups.chat');
      Route::post('groups/{group}/chat', [GroupController::class, 'store'])->name('user.groups.chat.store');
      Route::get('groups/{group}/chat/messages', [GroupController::class, 'messages'])->name('user.groups.chat.messages');

      // logout route
      Route::get('/logout', [GroupController::class, 'logout'])->name('user.logout');




  });

});

// All routes for the coach(role - 4) -------------------------------------------------------------

Route::prefix('coach')->group(function () {
    // Auth Routes for Coach
    // Route::get('/register/{id?}', [CoachAuthController::class, 'register'])->name('coach.register');
    // Route::post('/register', [CoachAuthController::class, 'registerStore'])->name('coach.store');
    Route::post('/send-otp', [CoachAuthController::class, 'sendOtp'])->name('coach.send.otp');
    Route::post('/verify-otp', [CoachAuthController::class, 'verifyOtp'])->name('coach.verify.otp');
    Route::post('/login', [CoachAuthController::class, 'loginStore'])->name('coach.login.store');
    Route::post('/send-otp-password', [CoachAuthController::class, 'sendOtpPassword'])->name('coach.send.otp.pass');
    Route::get('/forget-password',[CoachAuthController::class,'forgetPass'])->name('coach.forget.password');
    Route::post('/forget-password',[CoachAuthController::class,'forgetPassStore'])->name('coach.forget.password.store');
    
    Route::middleware('coach')->group(function () {
        
      Route::get('/dashboard', [CoachDashBoardController::class, 'dashboard'])->name('coach.dashboard');
      Route::get('/profile', [CoachDashBoardController::class, 'userProfile'])->name('coach.profile');
      Route::post('/profile', [CoachDashBoardController::class, 'userUpdateProfile'])->name('coach.update.profile');

      Route::get('/chat-leader-list', [CoachDashBoardController::class,'chatLeaderList'])->name('coach.chat.leaderList');
      Route::post('/send-message', [CoachDashBoardController::class, 'sendMessage'])->name('coach.send.message');
      
      Route::get('/logout', [CoachDashBoardController::class, 'logout'])->name('coach.logout');
      Route::get('/leader-list', [CoachDashBoardController::class, 'leaderList'])->name('coach.leader.list');

      Route::prefix('calendar')->group(function () {    
        Route::get('/', [CoachDashBoardController::class, 'calender'])->name('coach.calender.index');
        Route::post('/store', [CoachDashBoardController::class, 'storeTask'])->name('coach.calendar.store');
      });
    });
});