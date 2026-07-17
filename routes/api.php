<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HabitacionController;
use App\Http\Controllers\Api\HuespedController;
use App\Http\Controllers\Api\ReservaController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::apiResource('habitaciones', HabitacionController::class);

    Route::apiResource('huespedes', HuespedController::class);

    Route::apiResource('reservas', ReservaController::class);

});