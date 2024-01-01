<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsControlller extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::query()
                ->latest()
                ->filter(request(['search', 'category', 'author']))
                ->paginate(12)
                ->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
            'comments' => $post->comments()->simplePaginate(
                $perPage = 5, $columns = ['*'], $pageName = 'comments'
            )->withQueryString()
        ]);
    }
}
