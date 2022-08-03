<?php

namespace App\Interfaces;

use App\Models\Blog;
use Illuminate\Http\Request;

use App\Http\Requests\{
    CreateBlogRequest,
    UpdateBlogRequest
};

interface BlogInterface
{
    public function list(Request $req);

    public function create(CreateBlogRequest $req);

    public function update(UpdateBlogRequest $req, Blog $blog);

    public function delete(Blog $blog);
}
