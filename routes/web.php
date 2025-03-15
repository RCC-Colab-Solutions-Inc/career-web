<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobPostingController;
use App\Http\Controllers\FrontAPIControllers;
use App\Http\Middleware\LoginAuthorization;
use App\Http\Middleware\ApiAuthMiddleware;
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


    
Route::controller(JobPostingController::class)->group(function () {
    Route::get('/dashboard', 'index');
    Route::get('/job-listing', 'jobListing');
    Route::post('/add-job', 'addjob');
    Route::get('/applicants', 'applicants');
    Route::get('/', 'welcome');
   
});





// This route for API
