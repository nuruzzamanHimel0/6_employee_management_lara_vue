<?php

use App\Http\Controllers\Backend\ChangePasswordController;
use App\Http\Controllers\Backend\CountryController;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\StateController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('users', UserController::class);
Route::post('change/{user}/password', [ChangePasswordController::class,'changeUserPassword'])->name('user.change.password');

Route::resource('countries', CountryController::class);
Route::resource('states', StateController::class);
Route::resource('cities', CityController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
