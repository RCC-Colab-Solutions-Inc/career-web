<?php
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ApiAuthMiddleware;
use App\Http\Controllers\FrontAPIControllers;
use App\Http\Controllers\RegistrationAPIControllers;
use App\Http\Controllers\ClientMainController;
  
Route::middleware(['api.auth'])->group(function () {
    Route::controller(FrontAPIControllers::class)->group(function () {
        Route::get('/getjob', 'getjob');
        Route::post('/applyjob', 'apply');
        Route::post('/uploadcv', 'uploadcv');
       
    });
    
    Route::controller(RegistrationAPIControllers::class)->group(function(){
        Route::post('/register', 'register');
    });
    Route::prefix('client')
        ->controller(ClientMainController::class)
        ->group(function () {
            
            Route::post('loginfront', 'login');
    });

    Route::middleware('auth:company')
    ->prefix('client')
    ->controller(ClientMainController::class)
    ->group(function () {
        Route::get('dashboard', 'dashboardpage');
    });
    
});

