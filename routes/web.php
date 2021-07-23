<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryPostSearchController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostSearchController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('auth')->group(function() {
    Route::post('register', [RegisterController::class, 'store']);
    Route::get('register', [RegisterController::class, 'create']);
});

Route::prefix('posts')->group(function () {
    Route::get('search', [PostSearchController::class, 'index']);
    Route::resource('posts', PostController::class);
});

Route::prefix('authors')->group(function () {
    Route::resource('authors', UserController::class);
});

Route::prefix('categories')->group(function () {
    Route::get('search', [CategoryPostSearchController::class, 'index']);
    Route::resource('categories', CategoryController::class);
});
