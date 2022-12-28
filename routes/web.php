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

