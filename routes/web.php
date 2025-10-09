<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdvertisementController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EbookController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\LeaderController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\OurServicesController;
use App\Http\Controllers\Admin\PromocodeController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SubCategoriesController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\Web\WebsiteController;
use Illuminate\Support\Facades\Route;

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

