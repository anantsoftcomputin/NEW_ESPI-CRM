<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ApplicationFollowUpsController;
use App\Http\Controllers\ApplicationStatusController;
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
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionCreditController;
use App\Http\Controllers\OnlineExamController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\TaskController;
use App\Models\ApplicationFollowUps;
use App\Models\ApplicationStatus;

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

Route::get('/clear-cache', function() {
     \Artisan::call('cache:clear');
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
    Route::get('assessments/Add/{Enquiry}', [AssessmentController::class,'create'])->name('Assessment.Add');
    Route::get('AssessmentController/Remove/{Enquiry}', [AssessmentController::class,'destroy'])->name('Assessment.Remove');
    Route::post('EmailNotifyAssessment/{Enquiry}', [AssessmentController::class,'EmailNotifyAssessment'])->name('Assessment.EmailNotifyAssessment');
    Route::get('ApplyApplication/{Assessment}', [ApplicationController::class,'ApplyApplication'])->name('Assessment.Apply');
    Route::post('ApplyApplication/{Assessment}', [ApplicationController::class,'ApplyApplication'])->name('Assessment.ApplySubmit');
    Route::resource("assessments",AssessmentController::class);
    Route::resource('Enquires', EnquireController::class);
    Route::post('send-enquire/{Enquire}',[EnquireController::class,'SendEnquire'])->name('Enquires.send');
    Route::post('copy-enquire/{Enquire}',[EnquireController::class,'CopyEnquire'])->name('Enquires.copy');
    Route::get('Coaching',[EnquireController::class,'Coaching'])->name('Enquires.Coaching');
    Route::get('Failed',[EnquireController::class,'Failed'])->name('Enquires.Failed');
    Route::get('ChangeStatus/{Enquire}/{Status}',[EnquireController::class,'ChangeStatus'])->name('Enquires.ChangeStatus');
    Route::get('enquiry.index',[EnquireController::class,'get'])->name('Enquires.get');


    Route::resource('Application', ApplicationController::class);
    Route::get('Application/Add/{Enquiry}', [ApplicationController::class,'create'])->name('Application.Add');
    Route::resource('University', UniversityController::class);

    Route::resource('Course', CourseController::class);
    Route::get("Course/AddAssessment/{course?}",[CourseController::class,'ApplyAssessment'])->name('Course.AddAssessment');
    Route::get("courseDetail/edit/{course?}",[CourseController::class,'CourseDetail_edit']);
    Route::get('CourseDetail/{University?}',[CourseController::class,'CourseDetail'])->name("course.detail");
    Route::get('course/import/{University?}',[CourseController::class,'CourseImport'])->name("Course.import");
    Route::post('CourseImportPreview/{University?}',[CourseController::class,'CourseImportPreview'])->name("Course.import_preview");
    Route::post('CourseImportSave/{University?}',[CourseController::class,'CourseImportSave'])->name("Course.import_save");

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('enquire/detail/{Enquire}/{Active?}',[EnquiryDetailController::class,'detail'])->name('detail.nav');
    Route::get('conform_document/{Enquire}',[EnquiryDetailController::class,'conform_document'])->name('detail.conform_document');

    Route::post('document/store/{mode?}', [DocumentController::class,'store'])->name('document.store');
    Route::get('document/delete/{Document}/{mode?}', [DocumentController::class,'remove'])->name('document.delete');

    Route::resource('/Asset', AssetController::class);

    Route::post('FollowUp/store/{Enquire}',[FollowUpController::class,'store'])->name('FollowUp.store');
    Route::get('inquiry/FollowUp/{id?}',[FollowUpController::class,'ListByEnquiry']);
    Route::get('FollowUp/resolved/{FollowUp}/{status}',[FollowUpController::class,'resolved'])->name('FollowUp.resolved');

    Route::resource('Transactions', TransactionController::class);
    Route::post('Transactions/Add/{Enquire}',[TransactionController::class,'add'])->name('Transaction.Add');
    Route::get('enquiry/{id}/receipt',[TransactionController::class,'receipt'])->name('Transaction.receipt');
    // Route::post('FollowUp/store/{Enquire}',[FollowUpController::class,'store'])->name('FollowUp.store');


    Route::post('TransactionCredit/Add/{Enquire}',[TransactionCreditController::class,'add'])->name('TransactionCredit.Add');
    // Route::get('enquiry.index',[TransactionCreditController::class,'get'])->name('TransactionCredit.get');

    Route::resource('package',PackageController::class);
    Route::get('package',[PackageController::class,'index'])->name('package.index');

    Route::resource('card',CardController::class);
    Route::resource('task',TaskController::class);
    // Route::get('task',[TaskController::class,'index'])->name('task.index');
    Route::get('/task/{task}', [TaskController::class,'destroy'])->name('task.destroy');
    // Route::post('/tasks/{id}', 'TaskController@destroy')->name('task.destroy');
    // Route::get('card',[CardController::class,'index'])->name('card.index');
    // Route::get('card/{id}', [CardController::class,'destroy'])->name('card.destroy');

    // Route::get("/", function(){
    //     return view('user.profile');
    // });
    // Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.index');

    Route::get('email-test', function(){
        $details = App\Models\Enquiry::find(1);
        dispatch(new App\Jobs\WelcomeEmailJob($details));
        dd('done');
    });

    Route::resource('ApplicationStatus',ApplicationStatusController::class);
    Route::get('ApplicationStatus/UpdateVisibility/{id}',[ApplicationStatusController::class,'UpdateVisibility'])->name('ApplicationStatus.UpdateVisibility');

    Route::post('AddApplicationRemark/{id}',[ApplicationController::class,'ApplicationStatusRemark'])->name('Application.StatusRemark');
    Route::get('StartApplicationRemark/StartWorkStatus/{Application}/{status}',[ApplicationController::class,'StartWorkStatus'])->name('Application.StartWorkStatus');

    Route::post('ApplicationFollowUp/store/{Application}',[ApplicationFollowUpsController::class,'store'])->name('ApplicationFollowUp.store');
    Route::post('ApplicationFollowUp/reschedule/{Application}',[ApplicationFollowUpsController::class,'reschedule'])->name('ApplicationFollowUp.Reschedule');
    Route::get('Application/ApplicationFollowUp/{id?}',[ApplicationFollowUpsController::class,'ListByEnquiry']);
    Route::get('ApplicationFollowUp/resolved/{ApplicationFollowUp}/{status}',[ApplicationFollowUpsController::class,'resolved'])->name('ApplicationFollowUp.resolved');

    Route::post('OnlineExam/store',[OnlineExamController::class,'store'])->name('OnlineExam.store');
    Route::get('OnlineExam/{id}',[OnlineExamController::class,'remove'])->name('OnlineExam.remove');


});
Route::get('Report',[ReportController::class,'index'])->name('Report.index');
// Route::get('Report',[ReportController::class,'index'])->name('Report.general');
// Route::get('Report',[ReportController::class, 'create'])->name('Report');
Route::get('Report',[ReportController::class,'daily_report']);
// Route::get('Report', 'ReportController@daily_report');



Route::get('demo',function(){
    return view('search');
});



// Route::get('card',[App\Http\Controllers\CardController::class,'index'])->name('card.index');



Route::get('/', function () {
    return 'First sub domain';
})->domain('/{branch_name}.'.env('APP_URL'));


Route::get('/',[App\Http\Controllers\HomeController::class, 'index']);
Route::get('/{branch_name}/joinespi',[FrontendController::class, 'joinespi'])->name('join_espi');
Route::post('/{branch_name}/joinespi',[FrontendController::class, 'joinespistore'])->name('join_espi_store');


