<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SilderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ProducerController;
use App\Http\Controllers\CustomerController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'middleware' => ['checkAuth', 'checkAdmin']], function () {
    Route::get('/', function () {
        return view('dashboard.index');
    });


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
//        Route::get('/create', [CategoryController::class, 'create'])->name('create');
    });

    Route::group(['prefix' => 'producer', 'as' => 'producer.'], function () {
        Route::get('/', [ProducerController::class, 'index'])->name('index');
//        Route::get('/create', [ProducerController::class, 'create'])->name('create');
    });

    Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
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




