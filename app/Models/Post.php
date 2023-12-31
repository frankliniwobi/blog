<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Post

{
    public $title;
    public $excerpt;
    public $body;
    public $date;
    public $slug;

    public function __construct($title, $excerpt, $body, $date, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->body = $body;
        $this->date = $date;
        $this->slug = $slug;
    }

    public static function all()
    {
        $files = File::files(resource_path("posts"));

        return array_map(function ($file) {
            return $file->getContents();
        }, $files);
    }

    public static function find($slug)
    {
        $path = resource_path("posts/{$slug}.html");

        if (! $path) {
            throw new ModelNotFoundException();

        }

        return cache()->remember("post.{$slug}", 5, function() use ($path) {
            return file_get_contents($path);
        });
    }
}
