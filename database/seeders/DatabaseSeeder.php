<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@email.com',
            'password' => 'password',
            'is_admin' => true,
        ]);

        $users = User::factory(5)->create();

        $categories = Category::factory(3)->create();

        $posts = Post::factory(20)->recycle($users)->recycle($categories)->create();

        $comments = Comment::factory(50)->recycle($users)->recycle($posts)->create();
    }
}
