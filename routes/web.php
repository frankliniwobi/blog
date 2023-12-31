<?php

use App\Http\Controllers\PostsControlller;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
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

Route::get('/', [PostsControlller::class, 'index']);

Route::get('/posts/{post:slug}', function (Post $post) {

    return view('posts.show', [
        'post' => $post->load(['author', 'category'])
    ]);

});

Route::get('/categories/{category:slug}', function (Category $category) {

    return view('posts.index', [
        'posts' => $category->posts->load(['author', 'category'])
    ]);
 });

Route::get('/author/{author:username}', function (User $author) {

    return view('posts.index', [
        'posts' => $author->posts->load(['author', 'category'])
    ]);
 });
