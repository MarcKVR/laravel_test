<?php

use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'dashboard'], function () {
    // Route::resource('post', PostController::class);
    // Route::resource('category', CategoryController::class);

    Route::resources(
        [
            'post' => PostController::class,
            'category' => CategoryController::class,
        ]
    );
});