<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsControlller extends Controller
{
    public function index()
    {
        return view('welcome', [
            'posts' => Post::query()
                ->latest()
                ->with(['user', 'category'])
                ->filter(request(['search']))
                ->get()
        ]);
    }
}
