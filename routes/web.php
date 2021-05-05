<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::prefix('posts')->group(function() {
    Route::resource('posts', PostController::class);
});

Route::prefix('authors')->group(function() {
    Route::resource('authors', UserController::class);
});

Route::prefix('categories')->group(function() {
    Route::resource('categories', CategoryController::class);
});
