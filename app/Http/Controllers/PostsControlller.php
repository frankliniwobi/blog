<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
            'comments' => $post->comments()->latest()->simplePaginate(
                $perPage = 5, $columns = ['*'], $pageName = 'comments'
            )->withQueryString()
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => ['required', 'max:255'],
            'body' => ['required'],
            'slug' => ['required', 'max:225', Rule::unique('posts', 'slug')],
            'excerpt' => ['required', 'max:225'],
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        auth()->user()->posts()->create($attributes);

        return redirect('/')->with('success', 'Post created');

    }
}
