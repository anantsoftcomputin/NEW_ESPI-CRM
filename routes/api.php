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
use App\Http\Controllers\FollowUpController;
use App\Http\Controllers\ReferralCodeController;
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
    Route::get("getDetailsFromCourse/{course?}",[CourseController::class, 'getCourseDetails']);
    Route::get("getCourseFromLevel/{level?}/{university?}",[CourseController::class, 'getCourse']);
    Route::get("getEnquiry/{email?}",[EnquireController::class,"getEnquiryByEmail"]);
    Route::get("checkemail/{email?}",[EnquireController::class,"checkEmail"]);
    Route::get("otp_send/{email?}",[EnquireController::class,'sendOtp']);
    Route::get('inquiry/{id?}',[ApplicationController::class,'detailFromEnq']);
    Route::get('inquiry/FollowUp/{id?}',[FollowUpController::class,'ListByEnquiry']);
    Route::get('getUniversityFromCountry/{country_id}',[UniversityController::class,'getUniversityFromCountry']);
    Route::get('getCourseFromUniversity/{university_id}',[CourseController::class,'getCourseFromUniversity']);
    Route::get('university_campus/delete/{id}',[UniversityController::class,'university_campus_delete']);
    Route::get('getReferralByCode/{code}/',[ReferralCodeController::class,'getReferralByCode']);
    Route::get('getStateById/{state_id}/',[StateController::class,'getStateById']);
    Route::get('getCityById/{state_id}/',[CityController::class,'getCityById']);
    Route::get('getState/{country_id}',[StateController::class,'getStateByCountry']);
    Route::get('getCity/{state_id}',[CityController::class,'getCityByState']);
    Route::get("assign_user/{user_id?}/{assessment_id?}",[AssessmentController::class,'assessmentAssign']);
});
