<?php

use App\Http\Controllers\Api\RequestApiController;
use App\Http\Controllers\Api\StudentApiController;
use App\Http\Controllers\Api\RequestorAuthApiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::prefix('v1')->group(function () {
    Route::prefix('requestor')->group(function () {
        Route::post('login', [RequestorAuthApiController::class, 'login']);
        Route::post('register', [StudentApiController::class, 'store']);

        Route::middleware('api')->group(function () {
            Route::apiResource('requests', RequestApiController::class);
        });
    });
});
