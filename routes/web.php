<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnquireController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UniversityController;
use Illuminate\Http\Request;

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

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::resource('Enquires', EnquireController::class);
    Route::resource('Application', ApplicationController::class);
    Route::get('Application/Add/{Enquiry}', [ApplicationController::class,'create'])->name('Application.Add');
    Route::resource('University', UniversityController::class);
    Route::resource('Course', CourseController::class);
    Route::get('CourseDetail/{University?}',[CourseController::class,'CourseDetail'])->name("course.detail");
    Route::resource('Permissions', PermissionController::class)->except(['show','destroy','update']);
});

Route::get('demo',function(){
    return view('demo');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


