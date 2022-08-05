<?php

namespace Tests\Unit;


use App\Models\BlogCategory;
use App\Models\User;
use Tests\TestCase;

class BlogCategoryTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->be(User::factory()->create());
    }

    public function test_list()
    {
        BlogCategory::factory()->count(3)->create();

        $response = $this->get(route('blogCategoryList'));

        $response->assertStatus(200);
        $response->assertViewHas('list');
    }

    public function test_create()
    {
        $data = [
            'name' => fake()->title,
        ];

        $response = $this->post(route('blogCategoryCreate'), $data);

        $response->assertSessionHas('success');
    }

    public function test_update()
    {
        $category = BlogCategory::factory()->create();
        $data = [
            'name' => fake()->title,
        ];

        $response = $this->put(route('blogCategoryUpdate', $category), $data);

        $response->assertSessionHas('success');
    }

    public function test_delete()
    {
        $category = BlogCategory::factory()->create();

        $response = $this->delete(route('blogCategoryDelete', $category));

        $response->assertSessionHas('success');
        $this->assertSoftDeleted($category);
    }
}
