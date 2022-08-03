<?php

namespace App\Repositories;

use App\Interfaces\BlogInterface;
use App\Models\Blog;
use Illuminate\Http\Request;

use App\Http\Requests\{
    CreateBlogRequest,
    UpdateBlogRequest
};

class BlogRepository implements BlogInterface
{
    public function list(Request $req)
    {
        $list = Blog::orderBy('created_at', 'DESC')->get();

        return view('blog.list', compact('list'));
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
}
