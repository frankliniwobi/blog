<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsControlller extends Controller
{
    public function index()
    {
        $posts = Post::latest()->with(['user', 'category']);

        $search = request('search');

        if (request()->has('search')) {
            $posts = $posts->where('title', 'like', "%{$search}%")
                ->orWhere('excerpt', 'like', "%{$search}%")
                ->orWhere('body', 'like', "%{$search}%");
        }

        return view('welcome', [
            'posts' => $posts->get()
        ]);
    }
}
