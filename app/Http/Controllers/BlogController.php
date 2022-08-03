<?php

namespace App\Http\Controllers;

use App\Interfaces\BlogInterface;
use Illuminate\Http\Request;

use App\Http\Requests\{
    CreateBlogRequest,
    UpdateBlogRequest
};
use App\Models\{
    Blog,
    BlogCategory
};

class BlogController extends Controller
{
    public $blog;

    public function __construct(BlogInterface $blog)
    {
        $this->blog = $blog;
    }

    public function list(Request $req)
    {
        return $this->blog->list($req);
    }

    public function new()
    {
        $categories = BlogCategory::all();

        return view('blog.new', compact('categories'));
    }

    public function edit(Blog $blog)
    {
        $categories = BlogCategory::all();

        return view('blog.edit', compact('blog', 'categories'));
    }

    public function detail(Blog $blog)
    {
        return view('blog.detail', compact('blog'));
    }

    public function create(CreateBlogRequest $req)
    {
        return $this->blog->create($req);
    }

    public function update(UpdateBlogRequest $req, Blog $blog)
    {
        return $this->blog->update($req, $blog);
    }

    public function delete(Blog $blog)
    {
        return $this->blog->delete($blog);
    }
}
