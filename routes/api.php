<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\AssessmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController; 
use App\Http\Controllers\EnquireController; 
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

Route::prefix('admin')->group(function () {
    Route::get("otp_send/{email?}",[EnquireController::class,'sendOtp']);
    Route::get('inquiry/{id?}',[ApplicationController::class,'detailFromEnq']);
    Route::get('getUniversityFromCountry/{country_id}',[UniversityController::class,'getUniversityFromCountry']);
    Route::get('getCourseFromUniversity/{university_id}',[CourseController::class,'getCourseFromUniversity']);
    // Route::get('getUniversityFromCountry/{country_id}',[UniversityController::class,'getUniversityFromCountry']);
    Route::get('getState/{country_id}',[StateController::class,'getStateByCountry']);
    Route::get('getCity/{state_id}',[CityController::class,'getCityByState']);
    Route::get("assign_user/{user_id?}/{assessment_id?}",[AssessmentController::class,'assessmentAssign']);
});
