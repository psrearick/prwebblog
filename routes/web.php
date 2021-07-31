<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryPostSearchController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostSearchController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('ping', function () {
    $mailchimp = new \MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us6',
    ]);

    $response = $mailchimp->lists->getAllLists();
    ddd($response);
});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('auth')->group(function () {
    Route::post('register', [RegisterController::class, 'store'])->middleware('guest');
    Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
    Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
    Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
    Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');
});

Route::prefix('posts')->group(function () {
    Route::get('search', [PostSearchController::class, 'index']);
    Route::post('posts/{post:slug}/comments', [CommentController::class, 'store']);
    Route::resource('posts', PostController::class);
});

Route::prefix('authors')->group(function () {
    Route::resource('authors', UserController::class);
});

Route::prefix('categories')->group(function () {
    Route::get('search', [CategoryPostSearchController::class, 'index']);
    Route::resource('categories', CategoryController::class);
});
