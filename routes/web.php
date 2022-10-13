<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use \App\Http\Controllers\Backend\CommunityController;
use \App\Http\Controllers\Frontend\CommunityController as FrontendCommunityController;
use \App\Http\Controllers\Backend\CommunityPostController;
use \App\Http\Controllers\Frontend\PostController as FrontendPostController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/r/{slug}',[FrontendCommunityController::class,'show'])->name('frontend.communities.show');

Route::get('/r/{community_slug}/posts/{post:slug}',[FrontendPostController::class,'show'])
    ->name('frontend.communities.post.show');

Route::group(['middleware'=>['auth', 'verified']],function (){
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::resource('/dashboard/communities',CommunityController::class);
    Route::resource('/dashboard/communities.posts',CommunityPostController::class);
});

require __DIR__.'/auth.php';
