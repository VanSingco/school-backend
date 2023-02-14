<?php

use App\Http\Controllers\AssignSubjectController;
use App\Http\Controllers\AssignSubjectScheduleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\CustomGradingController;
use App\Http\Controllers\CustomGradingItemController;
use App\Http\Controllers\CustomGradingOptionController;
use App\Http\Controllers\CustomGradingStudentController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\GradeLevelController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\SchoolYearController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SectionStudentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
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


Route::get('schools/subdomain/{subdomain}', [SchoolController::class, 'getSchoolBySubdomain']);

Route::middleware('auth:api')->group(function () {
    Route::get('auth/user', [AuthController::class, 'user']);
    Route::post('auth/logout', [AuthController::class, 'logout']);

    Route::resource('subjects', SubjectController::class);
    Route::resource('grade-levels', GradeLevelController::class);
    Route::resource('school-years', SchoolYearController::class);
    Route::resource('schools', SchoolController::class);
    Route::resource('teachers', TeacherController::class);
    Route::resource('users', UserController::class);
    Route::resource('students', StudentController::class);
    Route::resource('families', FamilyController::class);
    Route::resource('sections', SectionController::class);
    Route::resource('section-students', SectionStudentController::class);
    Route::resource('assign-subjects', AssignSubjectController::class);
    Route::resource('assign-subject-schedules', AssignSubjectScheduleController::class);

    Route::resource('custom-gradings', CustomGradingController::class);
    Route::resource('custom-grading-items', CustomGradingItemController::class);
    Route::resource('custom-grading-options', CustomGradingOptionController::class);
    Route::resource('custom-grading-students', CustomGradingStudentController::class);
    
    // This will fetch all the region province city and barangay in the philippines
    Route::prefix('country-data')->group(function () {
        Route::get('region-province-city-brgy', [BaseController::class, 'getRegionProvinceCityBrgy']);
    });


});
