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
use App\Http\Controllers\AssetController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FcmTokenController;
use App\Http\Controllers\FollowUpController;
use App\Http\Controllers\FrontendController;

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

Route::get('/get_sub_domain', function () {
    return getCurrentCompany();
});
Route::get('/chate', function () {
    return view('chate');
});

Route::get('optimize', function () {
    \Artisan::call('optimize');
    return redirect('home');
});



Route::get("ocr",[HomeController::class,"ocr"]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::post('/save-token', [UserController::class, 'saveToken'])->name('save-token');

Route::post('import_parse', [UniversityController::class,"parseImport"])->name('import_parse');
Route::post('/import_process', [UniversityController::class,"processImport"])->name('import_process');
Route::post("/university_import_save",[UniversityController::class,"university_import_save"])->name("university_import_save");

Route::middleware('auth')->prefix('admin')->group(function () {

    Route::post('/send-notification/{user}', [FcmTokenController::class, 'sendNotification'])->name('send.notification');
    Route::get("fcm_token",[FcmTokenController::class,"index"]);
    Route::get("university/import",[UniversityController::class,"UniversityImport"])->name("university/import");
    Route::get('enquiry/resendotp/{id}', [EnquireController::class,'enquiryOtpSend'])->name('enquiry.resendotp');
    Route::post("verify_otp",[EnquireController::class,"verify_otp"])->name("verify_otp");
    Route::get("enquiryOtpSend/{id?}",[EnquireController::class,'enquiryOtpSend']);
    Route::get("uploaddocument",[UploadDocumentController::class,"index"])->name("uploaddocument.index");
    Route::post("uploaddocument/save",[UploadDocumentController::class,"store"])->name("uploaddocument.store");
    Route::get("uploaddocument/{assessment?}",[UploadDocumentController::class,'assessment_upload']);


    Route::post("Comment/{Enquiry}",[CommentController::class,'store'])->name('Comment.store');
    Route::resource("users",UserController::class);
    Route::resource("roles",RoleController::class);

    Route::get("EnquiryDetail/add/{id}/{step?}",[EnquiryDetailController::class,'Add'])->name('EnquiryDetail.add');
    Route::post("EnquiryDetail/store/{id?}",[EnquiryDetailController::class,'store'])->name('EnquiryDetail.store');

    Route::get("EnquiryDetail/show/{id}/{step?}",[EnquiryDetailController::class,'Show'])->name('EnquiryDetail.Show');
    Route::post("EnquiryDetail/update/{id?}",[EnquiryDetailController::class,'update'])->name('EnquiryDetail.update');
    Route::resource('permissions',PermissionController::class);
    Route::get('assessments/{id}/{status}/change_status', [AssessmentController::class,'status_change'])->name('assessment.status');
    Route::get('AssessmentController/Add/{Enquiry}', [AssessmentController::class,'create'])->name('Assessment.Add');
    Route::get('AssessmentController/Remove/{Enquiry}', [AssessmentController::class,'destroy'])->name('Assessment.Remove');
    Route::get('EmailNotifyAssessment/{Enquiry}', [AssessmentController::class,'EmailNotifyAssessment'])->name('Assessment.EmailNotifyAssessment');
    Route::get('ApplyApplication/{Assessment}', [ApplicationController::class,'ApplyApplication'])->name('Assessment.Apply');
    Route::post('ApplyApplication/{Assessment}', [ApplicationController::class,'ApplyApplication'])->name('Assessment.ApplySubmit');
    Route::resource("assessments",AssessmentController::class);
    Route::resource('Enquires', EnquireController::class);
    Route::post('send-enquire/{Enquire}',[EnquireController::class,'SendEnquire'])->name('Enquires.send');
    Route::resource('Application', ApplicationController::class);
    Route::get('Application/Add/{Enquiry}', [ApplicationController::class,'create'])->name('Application.Add');
    Route::resource('University', UniversityController::class);

    Route::resource('Course', CourseController::class);
    Route::get("courseDetail/edit/{course?}",[CourseController::class,'CourseDetail_edit']);
    Route::get('CourseDetail/{University?}',[CourseController::class,'CourseDetail'])->name("course.detail");
    Route::get('course/import/{University?}',[CourseController::class,'CourseImport'])->name("Course.import");
    Route::post('CourseImportPreview/{University?}',[CourseController::class,'CourseImportPreview'])->name("Course.import_preview");
    Route::post('CourseImportSave/{University?}',[CourseController::class,'CourseImportSave'])->name("Course.import_save");

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('detail/{Enquire}/{Active?}',[EnquiryDetailController::class,'detail'])->name('detail.nav');

    Route::post('document/store/{mode?}', [DocumentController::class,'store'])->name('document.store');
    Route::get('document/delete/{Document}/{mode?}', [DocumentController::class,'remove'])->name('document.delete');

    Route::resource('/Asset', AssetController::class);

    Route::post('FollowUp/store/{Enquire}',[FollowUpController::class,'store'])->name('FollowUp.store');



});



Route::get('demo',function(){
    return view('search');
});

Route::get('/',[App\Http\Controllers\HomeController::class, 'index']);
Route::get('/{branch_name}/joinespi',[FrontendController::class, 'joinespi'])->name('join_espi');
Route::post('/{branch_name}/joinespi',[FrontendController::class, 'joinespistore'])->name('join_espi_store');


