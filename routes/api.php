<?php
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ApiAuthMiddleware;
use App\Http\Controllers\FrontAPIControllers;
use App\Http\Controllers\RegistrationAPIControllers;
  

Route::controller(FrontAPIControllers::class)->group(function () {
    Route::get('/getjob', 'getjob');
    Route::post('/applyjob', 'apply');
   
});

Route::controller(RegistrationAPIControllers::class)->group(function(){
    Route::post('/register', 'register');
});