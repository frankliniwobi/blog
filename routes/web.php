<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogOutController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostsControlller;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PostsControlller::class, 'index'])->name('home');

Route::get('/posts/{post:slug}', [PostsControlller::class, 'show']);

Route::middleware('guest')->group(function() {

    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);

    Route::get('/login', [LoginController::class, 'create']);
    Route::post('/login', [LoginController::class, 'store']);

});

Route::middleware('auth')->group(function() {

    Route::post('/logout', LogOutController::class)->middleware('auth');

    Route::post('/posts/{post:slug}/comments', [PostCommentsController::class, 'store']);
});

Route::get('/admin/posts/create', [PostsControlller::class, 'create'])->middleware('admin');
Route::post('/admin/posts/create', [PostsControlller::class, 'store'])->middleware('admin');
