<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use \App\Http\Controllers\Backend\CommunityController;
use \App\Http\Controllers\Frontend\CommunityController as FrontendCommunityController;
use \App\Http\Controllers\Backend\CommunityPostController;
use \App\Http\Controllers\Frontend\PostController as FrontendPostController;
use \App\Http\Controllers\Frontend\PostCommentController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/r/{slug}', [FrontendCommunityController::class, 'show'])->name('frontend.communities.show');

Route::get('/r/{community_slug}/posts/{post:slug}', [FrontendPostController::class, 'show'])
    ->name('frontend.communities.post.show');

Route::post('/r/{community_slug}/posts/{post:slug}/comments', [PostCommentController::class, 'store'])
    ->name('frontend.post.comments');

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::resource('/communities', CommunityController::class);
    Route::resource('/communities.posts', CommunityPostController::class);
});

require __DIR__ . '/auth.php';
