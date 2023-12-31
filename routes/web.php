<?php

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

Route::get('/', function () {

   $posts = Post::all();

   return view('welcome', [
       'posts' => $posts
   ]);
});

Route::get('/posts/{post:slug}', function (Post $post) {

    return view('show', [
        'post' => $post
    ]);

});

Route::get('/categories/{category:slug}', function (Category $category) {

    return view('welcome', [
        'posts' => $category->posts
    ]);
 });

Route::get('/author/{author:slug}', function (User $author) {

    return view('welcome', [
        'posts' => $author->posts
    ]);
 });
