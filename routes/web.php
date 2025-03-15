<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobPostingController;
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



Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// });

Route::get('/dashboard', [JobPostingController::class, 'index'])->name('dashboard');
Route::get('/job-listing', [JobPostingController::class, 'jobListing'])->name('job-listing');
Route::post('/add-job', [JobPostingController::class, 'addjob'])->name('add-job');

Route::get('/add-job', function () {
    return view('add-job');
});

Route::get('/applicants', function () {
    return view('applicants');
});