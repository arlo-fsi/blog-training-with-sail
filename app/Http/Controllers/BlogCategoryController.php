<?php

namespace App\Http\Controllers;

use App\Interfaces\BlogCategoryInterface;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

use App\Http\Requests\{
    CreateBlogCategoryRequest,
    UpdateBlogCategoryRequest
};

class BlogCategoryController extends Controller
{
    private $category;

    public function __construct(BlogCategoryInterface $category)
    {
        $this->category = $category;
    }

    public function list(Request $req)
    {
        return $this->category->list($req);
    }

    public function create(CreateBlogCategoryRequest $req)
    {
        return $this->category->create($req);
    }

    public function update(UpdateBlogCategoryRequest $req, BlogCategory $blogCategory)
    {
        return $this->category->update($req, $blogCategory);
    }

    public function delete(BlogCategory $blogCategory)
    {
        return $this->category->delete($blogCategory);
    }
}
