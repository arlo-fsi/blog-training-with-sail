<?php

namespace App\Interfaces;

use App\Models\ArticleCategory;
use Illuminate\Http\Request;

use App\Http\Requests\{
    CreateArticleCategoryRequest,
    UpdateArticleCategoryRequest
};

interface ArticleCategoryInterface
{
    public function list(Request $req);

    public function create(CreateArticleCategoryRequest $req);

    public function update(UpdateArticleCategoryRequest $req, ArticleCategory $articleCategory);

    public function delete(ArticleCategory $articleCategory);
}
