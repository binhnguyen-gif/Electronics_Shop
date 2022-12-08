<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SilderController;

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

Route::get('/', function () {
    return view('dashboard.index');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'slider', 'as' => 'slider.'], function() {
    //
    Route::get('/', [SilderController::class, 'index'])->name('index');
    Route::get('/create', [SilderController::class, 'create'])->name('create');
    Route::post('/create', [SilderController::class, 'store'])->name('store');
});

