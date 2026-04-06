<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

use App\Http\Controllers\LogController;

// Rota para receber os logs: POST http://127.0.0.1:8081/api/logs
Route::post('/logs', [LogController::class, 'store']);