<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\CreatePostController;
use App\Http\Controllers\ViewPostsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'index');

Route::get('login', function () {
    return view('login');
})->middleware('guest');

Route::get('/viewpost', ViewPostsController::class);

Route::post('login', LoginController::class);

Route::get('dashboard', DashboardController::class)->middleware('auth');

Route::post('posts', CreatePostController::class)->middleware('auth');

Route::get('logout', LogoutController::class);


//Route::get('/login')->name('login')->middleware('guest');
/* Route::view('/', 'index')->name('login')->middleware('guest');
Route::get('home', function () {
    return view('home');
}); */
