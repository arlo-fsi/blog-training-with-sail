<?php

namespace App\Repositories;

use App\Interfaces\BlogInterface;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Http\Requests\{
    CreateBlogRequest,
    UpdateBlogRequest
};
use App\Models\{
    Blog,
    BlogCategory
};
use Illuminate\Support\{
    Collection,
    Str
};

class BlogRepository implements BlogInterface
{
    public function list(Request $req)
    {
        $q = $req->q ?? ' ';
        $page = $req->page ?? 1;
        $perPage = 10;

        $blogs = Blog::orderBy('created_at', 'DESC')->get();
        $list = $blogs->filter(function ($model) use ($q) {
            return Str::contains($model->search_terms, $q, true);
        });
        $list = $this->paginate($list, $perPage, $page)->setPath('');
        $categories = BlogCategory::all()->pluck('name')->toArray();

        return view('blog.list', compact('list', 'q', 'categories'));
    }

    public function create(CreateBlogRequest $req)
    {
        $values = $req->validated();
        Blog::create($values + [
            'updated_by' => auth()->id(),
        ]);
        session()->flash('success', 'Blog Created');

        return redirect()->back();
    }

    public function update(UpdateBlogRequest $req, Blog $blog)
    {
        $values = $req->validated();
        $blog->update($values + [
            'updated_by' => auth()->id(),
        ]);
        session()->flash('success', 'Blog Updated');

        return redirect()->back();
    }

    public function delete(Blog $blog)
    {
        $blog->delete();
        session()->flash('success', 'Blog Deleted');

        return redirect()->route('blogList');
    }

    private function paginate($items, $perPage = 15, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
