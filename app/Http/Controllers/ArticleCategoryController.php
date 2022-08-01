<?php

namespace App\Http\Controllers;

use App\Interfaces\ArticleCategoryInterface;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;

use App\Http\Requests\{
    CreateArticleCategoryRequest,
    UpdateArticleCategoryRequest
};

class ArticleCategoryController extends Controller
{
    public $articleCategory;

    public function __construct(ArticleCategoryInterface $articleCategory)
    {
        $this->articleCategory = $articleCategory;
    }

    public function list(Request $req)
    {
        return $this->articleCategory->list($req);
    }

    public function create(CreateArticleCategoryRequest $req)
    {
        return $this->articleCategory->create($req);
    }

    public function update(UpdateArticleCategoryRequest $req, ArticleCategory $articleCategory)
    {
        return $this->articleCategory->update($req, $articleCategory);
    }

    public function delete(ArticleCategory $articleCategory)
    {
        return $this->articleCategory->delete($articleCategory);
    }
}
