<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(8);

        return [
            'category_id' => Category::factory(),
            'user_id' => User::factory(),
            'title' => $title,
            'slug' => Str::slug($title),
            'excerpt' => fake()->paragraph(),
            'body' => fake()->paragraph(7),
            'published_at' => now()
        ];
    }
}
