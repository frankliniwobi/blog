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
                ->with(['author', 'category'])
                ->filter(request(['search', 'category']))
                ->get()
        ]);
    }
}
