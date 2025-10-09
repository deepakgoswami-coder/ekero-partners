<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LeaderController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Leader\AuthController as LeaderAuthController;
use App\Http\Controllers\Leader\DashBoardController as LeaderDashBoardController;
use App\Http\Controllers\User\AuthController as UserAuthController;
use App\Http\Controllers\User\DashBoardController as UserDhashBoardController;

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

// Route::get('/', function () {
//     return view('admin.auth.login');
// });

Route::post('admin/login', [AuthController::class, 'login'])->name('login');
Route::get('admin/login', [AuthController::class, 'loginGet']);
Route::get('/admin', [AuthController::class, 'loginGet']);

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
  Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');
  Route::resource('groups',AdminController::class,);
  Route::resource('leader',LeaderController::class,);
  Route::resource('member',MemberController::class,);
  Route::get('/group/assign/{id}', [AdminController::class, 'assignMember'])->name('groups.assign.member');
  Route::get('/group/link/{id}', [LeaderController::class, 'groupLink'])->name('user.group.link');
  Route::get('/group/links/{id}', [MemberController::class, 'groupLink'])->name('member.group.link');
  Route::post('/group/member', [AdminController::class, 'assignMemberAdd'])->name('group.member.assign');
  Route::post('/leader/toggle-status', [LeaderController::class, 'toggleStatus'])->name('leader.toggle_user_status');
  Route::post('/leader/toggle-statuss', [MemberController::class, 'toggleStatus'])->name('member.toggle_user_status');
});

// All routes for the leader(role - 2) ---
Route::prefix('leader')->group(function () {
  // register and login Routes for leader
    Route::get('/register', [LeaderAuthController::class, 'register'])->name('leader.register');
    Route::post('/register', [LeaderAuthController::class, 'registerStore'])->name('register.store');
    Route::post('/send-otp', [LeaderAuthController::class, 'sendOtp'])->name('send.otp');
    Route::post('/verify-otp', [LeaderAuthController::class, 'verifyOtp'])->name('verify.otp');
    Route::get('/login', [LeaderAuthController::class, 'login'])->name('leader.login');
    Route::post('/login', [LeaderAuthController::class, 'loginStore'])->name('leader.login.store');

    // middle ware applied routes for the leader
    Route::middleware('leader')->group(function () {
      Route::get('/dashboard', action: [LeaderDashBoardController::class, 'dashboard'])->name('leader.dashboard'); 
      
    });
});


// All routes for the user(role - 3) ---
Route::prefix('user')->group(function () {
  // register and login Routes for user
    Route::get('/register', [UserAuthController::class, 'register'])->name('user.register');
    Route::post('/register', [UserAuthController::class, 'registerStore'])->name('user.store');
    Route::post('/send-otp', [UserAuthController::class, 'sendOtp'])->name('send.otp');
    Route::post('/verify-otp', [UserAuthController::class, 'verifyOtp'])->name('verify.otp');
    Route::get('/login', [UserAuthController::class, 'login'])->name('user.login');
    Route::post('/login', [UserAuthController::class, 'loginStore'])->name('user.login.store');
    

    // middle ware applied routes for the user
    Route::middleware('user')->group(function () {
      Route::get('/dashboard', [UserDhashBoardController::class, 'dashboard'])->name('user.dashboard');


    });

});