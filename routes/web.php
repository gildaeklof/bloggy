<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ViewPostsController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\CreatePostController;

Route::get('/', [ViewPostsController::class, 'getAllPosts']);

Route::get('/food', [ViewPostsController::class, 'getFoodPosts']);

Route::get('/fashion', [ViewPostsController::class, 'getFashionPosts']);

Route::get('/lifestyle', [ViewPostsController::class, 'getLifestylePosts']);

Route::get('/interior', [ViewPostsController::class, 'getInteriorPosts']);

Route::get('login', function () {
    return view('login');
})->name('login')->middleware('guest');

Route::post('login', LoginController::class);

Route::get('dashboard', DashboardController::class)->middleware('auth');

Route::post('posts', CreatePostController::class)->middleware('auth');

Route::delete('posts/{post}/delete', [PostsController::class, 'deletePost'])->middleware('auth');

Route::patch('posts/{post}/edit', [PostsController::class, 'editPost'])->middleware('auth');

Route::post('comments', [CommentsController::class, 'createComment']);

Route::delete('comment/{comment}/delete', [CommentsController::class, 'deleteComment'])->middleware('auth');

Route::get('logout', LogoutController::class);
