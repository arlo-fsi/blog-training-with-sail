<?php

namespace Database\Factories;

use App\Models\ArticleCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'article_category_id' => ArticleCategory::factory(),
            'updated_user_id' => User::factory(),
            'title' => fake()->title(),
            'slug' => Str::slug(fake()->title),
            'contents' => fake()->paragraphs(3, true),
            'image_path' => fake()->imageUrl(),
        ];
    }
}
