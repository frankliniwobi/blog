<?php

use App\Models\Post;
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

Route::get('/posts/{post}', function ($slug) {

    //find a post by its slug
    $post = Post::find($slug);

    return view('show', [
        'post' => $post
    ]);
})->where('post', '[A-z_\-]+');
