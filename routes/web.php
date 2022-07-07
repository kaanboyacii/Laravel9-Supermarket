<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminPanel\HomeController as AdminHomeController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routesw-----
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//USER AUTH CONTROL
// Route::middleware('auth')->group(function() {
    //USER ROUTES
    Route::prefix('userpanel')->name('userpanel.')->controller(App\Http\Controllers\UserController::class)->group(function() {
        Route::get('/','index')->name('index');
        Route::get('/reviews','reviews')->name('reviews');
        Route::get('/reviewdestroy/{id}','reviewdestroy')->name('reviewdestroy');
        Route::get('/appointments','appointments')->name('appointments');
        Route::get('/showappointments/{id}','showappointments')->name('showappointments');
    });
    //ADMIN PANEL ROUTES
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function() {
        Route::get('/', [AdminHomeController::class, 'index'])->name('index');
        //ADMIN GENERAL ROUTES
        Route::get('/setting', [AdminHomeController::class, 'setting'])->name('setting');
        Route::post('/setting', [AdminHomeController::class, 'settingupdate'])->name('settingupdate');
    //ADMIN CATEGORY ROUTES
        Route::prefix('/category')->name('category.')->controller(AdminCategoryController::class)->group(function() {
            Route::get('/', [AdminCategoryController::class, 'index'])->name('index');
            Route::get('/create','create')->name('create');
            Route::post('/store','store')->name('store');
            Route::get('/edit/{id}','edit')->name('edit');
            Route::post('/update/{id}','update')->name('update');
            Route::get('/show/{id}','show')->name('show');
            Route::get('/delete/{id}','destroy')->name('delete');
        });
        //ADMIN SERVICE ROUTES
        Route::prefix('/service')->name('service.')->controller(AdminServiceController::class)->group(function() {
            Route::get('/', [AdminServiceController::class, 'index'])->name('index');
            Route::get('/create','create')->name('create');
            Route::post('/store','store')->name('store');
            Route::get('/edit/{id}','edit')->name('edit');
            Route::post('/update/{id}','update')->name('update');
            Route::get('/show/{id}','show')->name('show');
            Route::get('/delete/{id}','destroy')->name('delete');
        });
        //ADMIN IMAGE GALLERY ROUTES
        Route::prefix('/image')->name('image.')->controller(AdminImageController::class)->group(function() {
            Route::get('/{sid}', [AdminImageController::class, 'index'])->name('index');
            Route::post('/store/{sid}','store')->name('store');
            Route::get('/delete/{sid}/{id}','destroy')->name('delete');
        });
        //ADMIN MESSAGE ROUTES
        Route::prefix('/message')->name('message.')->controller(AdminMessageController::class)->group(function() {
            Route::get('/',[AdminMessageController::class, 'index'])->name('index');
            Route::get('/show/{id}','show')->name('show');
            Route::post('/update/{id}','update')->name('update');
            Route::get('/destroy/{id}','destroy')->name('destroy');
        });
        //ADMIN COMMENT ROUTES
        Route::prefix('/comment')->name('comment.')->controller(AdminCommentController::class)->group(function() {
            Route::get('/',[AdminCommentController::class, 'index'])->name('index');
            Route::get('/show/{id}','show')->name('show');
            Route::post('/update/{id}','update')->name('update');
            Route::get('/destroy/{id}','destroy')->name('destroy');
        });
        //ADMIN FAQ ROUTES
        Route::prefix('/faq')->name('faq.')->controller(AdminFaqController::class)->group(function() {
            Route::get('/',[AdminFaqController::class, 'index'])->name('index');
            Route::get('/create','create')->name('create');
            Route::post('/store','store')->name('store');
            Route::get('/edit/{id}','edit')->name('edit');
            Route::post('/update/{id}','update')->name('update');
            Route::get('/destroy/{id}','destroy')->name('destroy');
            Route::get('/show/{id}','show')->name('show');
        });
        //ADMIN APPOINTMENT ROUTES
        Route::prefix('/appointment')->name('appointment.')->controller(AdminAppointmentController::class)->group(function() {
            Route::get('/{slug}',[AdminAppointmentController::class, 'index'])->name('index');
            Route::get('/reject/{id}','reject')->name('reject');
            Route::post('/update/{id}','update')->name('update');
            Route::get('/show/{id}','show')->name('show');
        });
        //ADMIN USER ROUTES
        Route::prefix('/user')->name('user.')->controller(AdminUserController::class)->group(function() {
            Route::get('/','index')->name('index');
            Route::get('/edit/{id}','edit')->name('edit');
            Route::get('/show/{id}','show')->name('show');
            Route::post('/update/{id}','update')->name('update');
            Route::get('/destroy/{id}','destroy')->name('destroy');
            Route::post('/addrole/{id}','addrole')->name('addrole');
            Route::get('/destroyrole/{uid}/{rid}','destroyrole')->name('destroyrole');
        });
    });//admin panel routes
// });//user auth group


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/home',[HomeController::class, 'index'])->name('home');
Route::get('/admin',[AdminHomeController::class, 'index'])->name('admin');
