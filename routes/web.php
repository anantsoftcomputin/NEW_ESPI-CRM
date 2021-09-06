<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnquireController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EnquiryDetailController;
use App\Http\Controllers\UploadDocumentController;
use Illuminate\Http\Request;
use App\Http\Controllers\AssessmentController;
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
    return redirect(route('login'));
});

Route::get('/get_sub_domain', function () {
    return getCurrentCompany();
});

Auth::routes();

// Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function (){
//     \UniSharp\LaravelFilemanager\Lfm::routes();
// });

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get("uploaddocument",[UploadDocumentController::class,"index"])->name("uploaddocument.index");
    Route::post("uploaddocument/save",[UploadDocumentController::class,"store"])->name("uploaddocument.store");
    Route::get("uploaddocument/{assessment?}",[UploadDocumentController::class,'assessment_upload']);
    Route::resource("users",UserController::class);
    Route::resource("roles",RoleController::class);
    Route::get("EnquiryDetail/add/{id?}",[EnquiryDetailController::class,'Add'])->name('EnquiryDetail.add');
    Route::post("EnquiryDetail/store/{id?}",[EnquiryDetailController::class,'store'])->name('EnquiryDetail.store');
    Route::resource('permissions',PermissionController::class);
    Route::get('assessments/{id}/{status}/change_status', [AssessmentController::class,'status_change'])->name('assessment.status');
    Route::get('AssessmentController/Add/{Enquiry}', [AssessmentController::class,'create'])->name('Assessment.Add');
    Route::resource("assessments",AssessmentController::class);
    Route::resource('Enquires', EnquireController::class);
    Route::resource('Application', ApplicationController::class);
    Route::get('Application/Add/{Enquiry}', [ApplicationController::class,'create'])->name('Application.Add');
    Route::resource('University', UniversityController::class);
    Route::resource('Course', CourseController::class);
    Route::get("courseDetail/edit/{course?}",[CourseController::class,'CourseDetail_edit']);
    Route::get('CourseDetail/{University?}',[CourseController::class,'CourseDetail'])->name("course.detail");
});

Route::get('demo',function(){
    return view('demo');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


