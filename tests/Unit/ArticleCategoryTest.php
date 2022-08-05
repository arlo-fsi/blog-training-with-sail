<?php

namespace Tests\Unit;

use App\Models\ArticleCategory;
use App\Models\User;
use Tests\TestCase;

class ArticleCategoryTest extends TestCase
{
    private $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->be(User::find(1));
    }

    public function test_list()
    {
        $response = $this->get(route('articleCategoryList'));

        $response->assertStatus(200);
        $response->assertViewHas('list');
    }

    public function test_create()
    {
        $data = [
            'name' => fake()->title,
        ];

        $response = $this->post(route('articleCategoryCreate'), $data);

        $response->assertSessionHas('success');
    }

    public function test_update()
    {
        $category = ArticleCategory::factory()->create();
        $data = [
            'name' => fake()->title,
        ];

        $response = $this->put(route('articleCategoryUpdate', $category), $data);

        $response->assertSessionHas('success');
    }

    public function test_delete()
    {
        $category = ArticleCategory::factory()->create();

        $response = $this->delete(route('articleCategoryDelete', $category));

        $response->assertSessionHas('success');
        $this->assertSoftDeleted($category);
    }
}
