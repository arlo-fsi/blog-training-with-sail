<?php

namespace App\Repositories;

use App\Interfaces\BlogCategoryInterface;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

use App\Http\Requests\{
    CreateBlogCategoryRequest,
    UpdateBlogCategoryRequest
};

class BlogCategoryRepository implements BlogCategoryInterface
{
    public function list(Request $req)
    {
        $list = BlogCategory::all();

        return view('blog-category.list', compact('list'));
    }

    public function create(CreateBlogCategoryRequest $req)
    {
        $values = $req->validated();
        BlogCategory::create($values + [
            'updated_by' => auth()->id(),
        ]);
        session()->flash('success', 'Blog Category Added');

        return redirect()->back();
    }

    public function update(UpdateBlogCategoryRequest $req, BlogCategory $blogCategory)
    {
        $values = $req->validated();
        $blogCategory->update($values + [
            'updated_by' => auth()->id(),
        ]);
        session()->flash('success', 'Blog Category Updated');

        return redirect()->back();
    }

    public function delete(BlogCategory $blogCategory)
    {
        $blogCategory->delete();
        session()->flash('success', 'Blog Category Deleted');

        return redirect()->back();
    }
}
