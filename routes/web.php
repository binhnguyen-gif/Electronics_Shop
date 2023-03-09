<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProducerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SilderController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProductController as CartController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('show_login_form');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('show_registration_form');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::group(['middleware' => ['checkAdmin']], function () {
        Route::get('/', function () {
            return view('admin.dashboard.index');
        })->name('dashboard');


        Route::group(['prefix' => 'sliders', 'as' => 'sliders.'], function () {
            Route::get('/', [SilderController::class, 'index'])->name('index');
            Route::get('/create', [SilderController::class, 'create'])->name('create');
            Route::post('/create', [SilderController::class, 'store'])->name('store');
            Route::get('/show/{id}', [SilderController::class, 'show'])->name('show');
            Route::put('/update/{id}', [SilderController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [SilderController::class, 'delete'])->name('delete');
            Route::get('/recyclebin', [SilderController::class, 'recyclebin'])->name('recyclebin');
            Route::put('/restore/{id}', [SilderController::class, 'restore'])->name('restore');
            Route::delete('/forever-delete/{id}', [SilderController::class, 'foreverDelete'])->name('forever_delete');
        });

        Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
            Route::get('/', [CategoryController::class, 'index'])->name('index');
            Route::get('/create', [CategoryController::class, 'create'])->name('create');
            Route::post('/create', [CategoryController::class, 'store'])->name('store');
            Route::get('/show/{id}', [CategoryController::class, 'show'])->name('show');
            Route::put('/update/{id}', [CategoryController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [CategoryController::class, 'delete'])->name('delete');
            Route::get('/recyclebin', [CategoryController::class, 'recyclebin'])->name('recyclebin');
            Route::put('/restore/{id}', [CategoryController::class, 'restore'])->name('restore');
            Route::delete('/forever-delete/{id}', [CategoryController::class, 'foreverDelete'])->name('forever_delete');
        });

        Route::group(['prefix' => 'producer', 'as' => 'producer.'], function () {
            Route::get('/', [ProducerController::class, 'index'])->name('index');
            Route::get('/create', [ProducerController::class, 'create'])->name('create');
            Route::post('/create', [ProducerController::class, 'store'])->name('store');
            Route::get('/show/{id}', [ProducerController::class, 'show'])->name('show');
            Route::put('/update/{id}', [ProducerController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [ProducerController::class, 'delete'])->name('delete');
            Route::get('/recyclebin', [ProducerController::class, 'recyclebin'])->name('recyclebin');
            Route::put('/restore/{id}', [ProducerController::class, 'restore'])->name('restore');
            Route::delete('/forever-delete/{id}', [ProducerController::class, 'foreverDelete'])->name('forever_delete');
        });

        Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
            Route::get('/', [ProductController::class, 'index'])->name('index');
            Route::get('/create', [ProductController::class, 'create'])->name('create');
            Route::post('/create', [ProductController::class, 'store'])->name('store');
            Route::get('/show/{id}', [ProductController::class, 'show'])->name('show');
            Route::put('/update/{id}', [ProductController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [ProductController::class, 'delete'])->name('delete');
            Route::get('/recyclebin', [ProductController::class, 'recyclebin'])->name('recyclebin');
            Route::put('/restore/{id}', [ProductController::class, 'restore'])->name('restore');
            Route::delete('/forever-delete/{id}', [ProductController::class, 'foreverDelete'])->name('forever_delete');
        });

        Route::group(['prefix' => 'customer', 'as' => 'customer.'], function () {
            Route::get('/', [CustomerController::class, 'index'])->name('index');
//        Route::get('/create', [CustomerController::class, 'create'])->name('create');
        });

        Route::group(['prefix' => 'orders', 'as' => 'orders.'], function () {
            Route::get('/', [OrderController::class, 'index'])->name('index');
//        Route::get('/create', [OrderController::class, 'create'])->name('create');
        });

        Route::group(['prefix' => 'contact', 'as' => 'contact.'], function () {
            Route::get('/', [ContactController::class, 'index'])->name('index');
//        Route::get('/create', [ContactController::class, 'create'])->name('create');
        });

        Route::group(['prefix' => 'coupon', 'as' => 'coupon.'], function () {
            Route::get('/', [CouponController::class, 'index'])->name('index');
            Route::get('/create', [CouponController::class, 'create'])->name('create');
        });
    });
});

//Client
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product/{id}', [HomeController::class, 'detail'])->name('detail');
Route::get('/yield/{search?}', [CartController::class, 'index'])->name('yield');
Route::get('/add-to-cart/{id}', [CartController::class, 'addCart'])->name('add_cart');
Route::get('/cart-detail', [CartController::class, 'show'])->name('cart_detail');
//Route::get('/detail', [HomeController::class, 'detail'])->name('detail');

Route::get('/set-locale/{language}', [LanguageController::class, 'setLocale'])->name('set_locale');




