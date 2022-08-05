<?php

namespace Tests\Unit;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    private $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function test_list()
    {
        ArticleCategory::factory()->create();
        Article::factory()->count(3)->create();

        $response = $this->actingAs($this->user)->get(route('articleList'));

        $response->assertStatus(200);
        $response->assertViewHas('categories');
        $response->assertViewHas('articles');
    }

    public function test_create()
    {
        $data = [
            'title' => fake()->title,
            'article_category_id' => 1,
            'contents' => fake()->paragraphs(2, true),
        ];

        $response = $this->actingAs($this->user)->post(route('articleCreate'), $data);

        $response->assertSessionHas('success');
    }

    public function test_update()
    {
        $article = Article::factory()->create();
        $data = [
            'title' => fake()->title,
            'article_category_id' => 1,
            'contents' => fake()->paragraphs(2, true),
        ];

        $response = $this->actingAs($this->user)->put(route('articleUpdate', $article), $data);

        $response->assertSessionHas('success');
    }

    public function test_delete()
    {
        $article = Article::factory()->create();

        $response = $this->actingAs($this->user)->delete(route('articleDelete', $article));

        $response->assertSessionHas('success');
        $this->assertSoftDeleted($article);
    }

    public function test_upload_image()
    {
        $upload = UploadedFile::fake()->image('sample.jpg');

        $response = $this->actingAs($this->user)->post(route('articleUploadImage'), compact('upload'));

        $response->assertStatus(200);
        $response->assertSessionHas('imagePath');
    }
}
