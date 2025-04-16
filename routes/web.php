<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobPostingController;
use App\Http\Controllers\FrontAPIControllers;
use App\Http\Middleware\LoginAuthorization;
use App\Http\Middleware\ApiAuthMiddleware;
use App\Http\Controllers\LoginMainController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardControllers;
use App\Http\Controllers\ClientMainController;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




// Route::get('/dashboard', function () {
//     return view('dashboard');
// });


    


// ✅ Protected Routes (Only Accessible if Logged In)
Route::middleware(['web', 'auth'])->controller(JobPostingController::class)->group(function () {
    
    Route::get('/job-listing', 'jobListing')->name('job-listing');
    Route::get('/add-job', 'addjobform');
    Route::post('/addjob', 'addjob');
    
    Route::get('/users', 'user');
    Route::get('/applicant-login', 'applicantlogin');
    Route::get('/applicant-form', 'applicantform');
    Route::get('/profile', 'myprofile');
    Route::get('/application/position', 'positionpage');
    Route::get('/ip-address', 'ipaddress');


    //make urgent
    Route::get('/make-urgent/{jobid}', 'makeurgent');
    Route::get('/job-status/{jobid}', 'jobstatus');
    Route::get('/delete-job/{jobid}', 'jobdelete');
});
Route::middleware(['web', 'auth'])->controller(DashboardControllers::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard');
});
Route::middleware(['web', 'auth'])->controller(CompanyController::class)->group(function () {
    Route::get('/companies', 'company');
    Route::post('/add-company', 'addcompanyform');
    Route::post('/edit-company', 'updatecompany');
});
Route::controller(ClientMainController::class)->group(function () {
    Route::get('/client/login', 'client');
    Route::get('/client/dashboard', 'dashboardpage');
    Route::get('/client/applicants', 'applicantspage');
    Route::get('/client/message', 'messagepage');
    Route::get('/client/company-profile', 'companyprofile');

 
});

Route::middleware(['web', 'auth'])->controller(ApplicantController::class)->group(function () {
    Route::get('/applicants', 'applicants');
    Route::get('/selectapplicants/{jobid}', 'selectapplicant');
    Route::post('/updateapplicantstatus', 'updateapplicantstatus');
    Route::post('/forwardtoclient', 'forwardtoclient');
});

// ✅ Public Routes (Login & Logout)
Route::controller(LoginMainController::class)->group(function () {
    Route::get('/', 'welcome')->name('login'); // 🔹 Add 'name' to login for proper redirect
    Route::post('/login', 'login');
    Route::get('/logout', 'logout')->name('logout'); // 🔹 Use POST method for security
});
