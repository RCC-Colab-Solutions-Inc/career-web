<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobPostingController;
use App\Http\Controllers\FrontAPIControllers;
use App\Http\Middleware\LoginAuthorization;
use App\Http\Middleware\ApiAuthMiddleware;
use App\Http\Controllers\LoginMainController;
use App\Http\Controllers\ApplicantController;
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
    Route::get('/dashboard', 'index')->name('dashboard');
    Route::get('/job-listing', 'jobListing')->name('job-listing');
    Route::get('/add-job', 'addjobform');
    Route::post('/addjob', 'addjob');
    Route::get('/companies', 'company');
    Route::get('/users', 'user');
    Route::get('/applicant-login', 'applicantlogin');
    Route::get('/applicant-form', 'applicantform');
});

Route::middleware(['web', 'auth'])->controller(ApplicantController::class)->group(function () {
    Route::get('/applicants', 'applicants');
    Route::get('/selectapplicants/{jobid}', 'selectapplicant');
});

// ✅ Public Routes (Login & Logout)
Route::controller(LoginMainController::class)->group(function () {
    Route::get('/', 'welcome')->name('login'); // 🔹 Add 'name' to login for proper redirect
    Route::post('/login', 'login');
    Route::get('/logout', 'logout')->name('logout'); // 🔹 Use POST method for security
});
