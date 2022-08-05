<?php

namespace Tests\Unit;


use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\User;
use Tests\TestCase;

class BlogTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->be(User::find(1));
    }

    public function test_list()
    {
        Blog::factory()->count(3)->create();

        $response = $this->get(route('blogList'));

        $response->assertStatus(200);
        $response->assertViewHas('list');
    }

    public function test_detail()
    {
        $blog = Blog::factory()->create();

        $response = $this->get(route('blogDetail', $blog));

        $response->assertStatus(200);
        $response->assertViewHas('blog');
    }

    public function test_create()
    {
        BlogCategory::factory()->create();
        $data = [
            'title' => fake()->title,
            'blog_category_id' => 1,
            'contents' => fake()->paragraphs(3, true),
        ];

        $response = $this->post(route('blogCreate'), $data);

        $response->assertSessionHas('success');
    }

    public function test_update()
    {
        $blog = Blog::factory()->create();
        $data = [
            'title' => fake()->title,
            'blog_category_id' => 1,
            'contents' => fake()->paragraphs(3, true),
        ];

        $response = $this->put(route('blogUpdate', $blog), $data);

        $response->assertSessionHas('success');
    }

    public function test_delete()
    {
        $blog = Blog::factory()->create();

        $response = $this->delete(route('blogDelete', $blog));

        $response->assertSessionHas('success');
        $this->assertSoftDeleted($blog);
    }
}
