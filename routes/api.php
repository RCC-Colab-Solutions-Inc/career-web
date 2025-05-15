<?php
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ApiAuthMiddleware;
use App\Http\Controllers\FrontAPIControllers;
use App\Http\Controllers\RegistrationAPIControllers;
use App\Http\Controllers\ClientMainController;
use App\Http\Controllers\ApplicantFrontEndClient;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\MessageController;

Route::middleware(['api.auth'])->group(function () {

    Route::prefix('client/messages')->group(function () {
        Route::post('/start-conversation', [MessageController::class, 'startConversation']);
        Route::post('/send', [MessageController::class, 'sendMessage']);
        Route::get('/conversations', [MessageController::class, 'getConversations']);
        Route::get('/conversation/{conversationId}', [MessageController::class, 'getMessages']);
    });
    
    
    Route::controller(RegistrationAPIControllers::class)->group(function(){
        Route::post('/register', 'register');
    });
    Route::prefix('client')
        ->controller(ClientMainController::class)
        ->group(function () {
            
            Route::post('loginfront', 'login');
            Route::post('change-password', [ClientMainController::class, 'changePassword']);
            Route::get('dashboard', 'dashboardpage');
            Route::get('companyprofile', 'companyprofile');
            Route::get('selectapplicants', 'selectapplicants');
            Route::post('updateapplicant', 'updateapplicant');
            Route::get('positions', 'positions');
            Route::post('updateemails', 'updateemails');
            Route::post('getapplicantstatus', 'getapplicantstatus');
            Route::post('scheduleapplicant', 'SaveSchedule');
            Route::post('ApproveInvites', 'ApproveInvites');
            Route::post('CancelSchedule', 'cancelSchedule');
            Route::get('getschedule', 'getSchedule');
            Route::post('UpdateStatusSchedule', 'UpdateStatusSchedule');
    });
    Route::prefix('client')
        ->group(function () {
            Route::get('/view-resume/{applicantId}', [ApplicantController::class, 'viewFrontResume']);
        });
    

    // Route for Applicant Checking
    Route::prefix('client')->controller(ApplicantFrontEndClient::class)->group(function () {
        Route::get('getjob', 'getjob');
        Route::get('getjob/{id}', 'getSpecificJob');
        Route::post('applyjob', 'apply');
        Route::post('uploadcv', 'uploadcv');
        Route::post('checkapplicant', 'checkapplicant');

        
    });
});

Route::prefix('messages/applicant')->group(function () {
    Route::get('/conversations', [MessageController::class, 'getApplicantConversations']);
    Route::get('/conversation/{id}', [MessageController::class, 'getApplicantMessages']);
    Route::post('/send', [MessageController::class, 'sendApplicantMessage']);
});

