<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::prefix('posts')->group(function() {
    Route::get('categories/{category}', [PostController::class, 'categoryIndex']);
    Route::get('authors/{user}', [PostController::class, 'userIndex']);
    Route::resource('posts', PostController::class);
});

Route::resource('categories', CategoryController::class);
