<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\GradeLevelController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\SchoolYearController;
use App\Http\Controllers\SubjectController;
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

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('super-admin-login', [AuthController::class, 'superAdminLogin']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('auth/user', [AuthController::class, 'user']);
    Route::post('auth/logout', [AuthController::class, 'logout']);

    Route::resource('subjects', SubjectController::class);
    Route::resource('grade-levels', GradeLevelController::class);
    Route::resource('school-years', SchoolYearController::class);
    Route::resource('schools', SchoolController::class);

    Route::prefix('country-data')->group(function () {
        Route::get('region', [BaseController::class, 'getRegion']);
        Route::get('province', [BaseController::class, 'getProvince']);
        Route::get('city', [BaseController::class, 'getCity']);
        Route::get('barangay', [BaseController::class, 'getBarangay']);
    });


});
