<?php

namespace Database\Factories;

use App\Models\BlogCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'blog_category_id' => BlogCategory::factory(),
            'title' => fake()->title,
            'contents' => fake()->paragraph,
            'image_path' => fake()->imageUrl,
            'updated_by' => User::factory(),
        ];
    }
}
