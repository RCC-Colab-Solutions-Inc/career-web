<?php
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ApiAuthMiddleware;
use App\Http\Controllers\FrontAPIControllers;
  

Route::controller(FrontAPIControllers::class)->group(function () {
    Route::get('/getjob', 'getjob');
    Route::post('/applyjob', 'apply');
});