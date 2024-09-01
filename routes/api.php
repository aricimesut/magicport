<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\TaskController;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login']);

//auth:api middleware
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('project', ProjectController::class);
    Route::apiResource('task', TaskController::class);

});
