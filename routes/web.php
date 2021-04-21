<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/posts/{slug}', [PostController::class, 'show'])
    ->where('slug', '[A-z_\-]+');
