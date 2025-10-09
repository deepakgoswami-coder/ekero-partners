<?php

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
use App\Http\Controllers\Leader\AuthController as LeaderAuthController;

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

});

Route::middleware(['user'])->group(function () {
  Route::get('/chat/{id}', [WebsiteController::class, 'index'])->name('web.chat.index');

});
// All routes for the leader(role - 2) ---

Route::prefix('leader')->group(function () {

    Route::get('/register', [LeaderAuthController::class, 'register'])->name('leader.register');
    Route::post('/register', [LeaderAuthController::class, 'registerStore'])->name('register.store');
    Route::post('/send-otp', [LeaderAuthController::class, 'sendOtp'])->name('send.otp');
    Route::post('/verify-otp', [LeaderAuthController::class, 'verifyOtp'])->name('verify.otp');



});