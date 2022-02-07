<?php

use App\Http\Controllers\Backend\ChangePasswordController;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\Backend\UserController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('users', UserController::class);
Route::post('change/{user}/password', [ChangePasswordController::class,'changeUserPassword'])->name('user.change.password');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
