<?php

namespace App\Interfaces;

use App\Models\BlogCategory;
use Illuminate\Http\Request;

use App\Http\Requests\{
    CreateBlogCategoryRequest,
    UpdateBlogCategoryRequest
};

interface BlogCategoryInterface
{
    public function list(Request $req);

    public function create(CreateBlogCategoryRequest $req);

    public function update(UpdateBlogCategoryRequest $req, BlogCategory $blogCategory);

    public function delete(BlogCategory $blogCategory);
}
