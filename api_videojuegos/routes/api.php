<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\AuthController;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('Games', GameController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('games', GameController::class);
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('games', GameController::class);  
});

