<?php

use App\Http\Controllers\Api\V1\EventController;
use App\Http\Controllers\Api\V1\PersonalAccessController;
use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('/personal-access-tokens', [PersonalAccessController::class, 'store']);

Route::post('/register', [UserController::class, 'store']);


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/events', [EventController::class, 'store']);
    Route::get('/events', [EventController::class, 'index']);
    Route::delete('/events/{id}', [EventController::class, 'destroy']);
    Route::patch('/events/{id}', [EventController::class, 'update']);
});
