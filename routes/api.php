<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('auth', [AuthController::class, 'redirectToAuth']);
Route::get('auth/callback', [AuthController::class, 'handleAuthCallback']);