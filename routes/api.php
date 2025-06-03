<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\GuestController;
use App\Http\Controllers\API\ServiceRequestController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(AuthController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});
         
Route::middleware('auth:sanctum')->group( function () {
    Route::apiResource('guests', GuestController::class);
    Route::apiResource('service-requests', ServiceRequestController::class);
    Route::put('/service-requests/{id}/status', [ServiceRequestController::class, 'updateStatus']);
});
