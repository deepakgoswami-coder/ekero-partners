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
  Route::get('/astro/create', [UserController::class, 'createAstro'])->name('users.astro.create');
  Route::post('/astro/store', [UserController::class, 'storeAstro'])->name('users.astro.store');
  Route::post('/chat/show/{id}', [ChatController::class, 'show'])->name('chat.sow');

  Route::resource('users', UserController::class);
  Route::resource('our-services', OurServicesController::class);
  Route::resource('news', NewsController::class);
  Route::resource('blogs', BlogController::class);
  Route::resource('customers', CustomerController::class);
  Route::resource('faqs', FaqController::class);
  Route::resource('e-book', EbookController::class);
  Route::resource('promocode', PromocodeController::class);
  
  // Route::resource('categories', CategoryController::class);
  // Route::resource('sub-categories', SubCategoriesController::class);
  // Route::resource('banner', BannerController::class);
  // Route::resource('news', NewsController::class);
  // Route::resource('advertisement', AdvertisementController::class);
  // Route::resource('setting', SettingController::class);
  // Route::resource('language', LanguageController::class);
  // Route::get('comments', [CommentController::class,'index'])->name('comments.index');

  Route::get('/chat', [ChatController::class, 'index'])->prefix('user')->name('chat.index');
  Route::get('/chat/{user}', [ChatController::class, 'chatWith'])->name('chat.with');
  Route::post('/chat/send', [ChatController::class, 'send'])->name('chat.send');
  Route::get('/inquery/index', [ChatController::class, 'inquery'])->name('inquery.index');
    Route::post('/change-status', [ChatController::class, 'changeStatus'])->name('web.toggle_user_status');
  Route::post('/change-status/service', [ChatController::class, 'changeStatusService'])->name('web.toggle_service_status');
  Route::post('/change-status/blog', [ChatController::class, 'changeStatusBlogs'])->name('web.toggle_blogs_status');
  Route::post('/change-status/ebook', [ChatController::class, 'changeStatusebook'])->name('web.toggle_ebook_status');

});

Route::middleware(['user'])->group(function () {
  Route::get('/chat/{id}', [WebsiteController::class, 'index'])->name('web.chat.index');

});

