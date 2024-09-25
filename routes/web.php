<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Web\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('auth/login');
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resources([
        'post' => PostController::class,
        'category' => CategoryController::class,
    ]);
});

Route::group(['prefx' => 'blog'], function () {
    Route::controller(BlogController::class)->group(function() {
        Route::get('/', 'index')->name('web.blog.index');
        Route::get('/detail/{post}', 'show')->name('web.blog.show');
    });

});

require __DIR__.'/auth.php';
