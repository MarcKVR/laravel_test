<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('auth', [AuthController::class, 'redirectToAuth']);
Route::get('auth/callback', [AuthController::class, 'handleAuthCallback']);

Route::post('auth/social', [AuthController::class, 'authenticateSocialMethod']);

Route::get('category/all', [CategoryController::class, 'all']);
Route::get('category/slug/{slug}', [CategoryController::class, 'slug']);
Route::get('category/{category}/posts', [CategoryController::class, 'posts']);
Route::resource('category', CategoryController::class)->except(['create', 'edit']);

Route::get('post/all', [PostController::class, 'all']);
Route::get('post/slug/{post:slug}', [PostController::class, 'slug']);
Route::resource('post', PostController::class)->except(['create', 'edit']);
