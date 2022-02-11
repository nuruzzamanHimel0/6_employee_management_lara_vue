<?php

use App\Http\Controllers\Api\EmployeeDataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('employees/countries',[EmployeeDataController::class , 'countries']);
Route::get('employees/{country}/state',[EmployeeDataController::class , 'state']);
Route::get('employees/{state}/cities',[EmployeeDataController::class , 'cities']);
Route::get('employees/departments',[EmployeeDataController::class , 'departments']);
