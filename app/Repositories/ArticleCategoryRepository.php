<?php

namespace App\Repositories;

use App\Interfaces\ArticleCategoryInterface;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;

use App\Http\Requests\{
    CreateArticleCategoryRequest,
    UpdateArticleCategoryRequest
};

class ArticleCategoryRepository implements ArticleCategoryInterface
{
    public function list(Request $req)
    {
        $list = ArticleCategory::all();

        return view('article-category.list', compact('list'));
    }

    public function create(CreateArticleCategoryRequest $req)
    {
        $values = $req->validated();

        ArticleCategory::create($values + [
            'updated_user_id' => auth()->id(),
        ]);
        session()->flash('success', 'Category Added');

        return redirect()->back();
    }

    public function update(UpdateArticleCategoryRequest $req, ArticleCategory $articleCategory)
    {
        $values = $req->validated();
        $articleCategory->update($values + [
            'updated_user_id' => auth()->id(),
        ]);
        session()->flash('success', 'Category Updated');

        return redirect()->back();
    }

    public function delete(ArticleCategory $articleCategory)
    {
        $articleCategory->delete();
        session()->flash('success', 'Category Deleted');

        return redirect()->back();
    }
}
