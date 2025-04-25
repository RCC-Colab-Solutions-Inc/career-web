<?php
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ApiAuthMiddleware;
use App\Http\Controllers\FrontAPIControllers;
use App\Http\Controllers\RegistrationAPIControllers;
use App\Http\Controllers\ClientMainController;
use App\Http\Controllers\ApplicantFrontEndClient;
use App\Http\Controllers\ApplicantController;

Route::middleware(['api.auth'])->group(function () {
    
    
    Route::controller(RegistrationAPIControllers::class)->group(function(){
        Route::post('/register', 'register');
    });
    Route::prefix('client')
        ->controller(ClientMainController::class)
        ->group(function () {
            
            Route::post('loginfront', 'login');
            Route::get('dashboard', 'dashboardpage');
            Route::get('companyprofile', 'companyprofile');
            Route::get('selectapplicants', 'selectapplicants');
            Route::post('updateapplicant', 'updateapplicant');
            Route::get('positions', 'positions');
            Route::post('updateemails', 'updateemails');
            Route::post('getapplicantstatus', 'getapplicantstatus');
    });
    Route::get('/view-resume/{applicantId}', [ApplicantController::class, 'viewFrontResume']);

    
    
    // Route for Applicant Checking
    Route::prefix('client')->controller(ApplicantFrontEndClient::class)->group(function () {
        Route::get('getjob', 'getjob');
        Route::get('getjob/{id}', 'getSpecificJob');
        Route::post('applyjob', 'apply');
        Route::post('uploadcv', 'uploadcv');
        Route::post('checkapplicant', 'checkapplicant');
        
    });
   
    
    
});

