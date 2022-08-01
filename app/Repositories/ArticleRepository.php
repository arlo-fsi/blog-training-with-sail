<?php

namespace App\Repositories;

use App\Interfaces\ArticleInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Http\Requests\{
    CreateArticleRequest,
    UpdateArticleRequest,
    UploadArticleImageRequest
};
use App\Models\{
    Article,
    ArticleCategory
};

class ArticleRepository implements ArticleInterface
{
    public function list(Request $req)
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(5);
        $categories = ArticleCategory::all();

        return view('article.list', compact('articles', 'categories'));
    }

    public function create(CreateArticleRequest $req)
    {
        $values = $req->validated();
        $slug = Str::slug($values['title']);

        $found = true;
        $temp = $slug;
        while ($found) {
            $exists = Article::where('slug', $temp)->first();
            if ($exists) {
                $temp = $slug . '-' . random_int(1, 999);
            } else {
                $found = false;
            }
        }
        $slug = $temp;
        Article::create($values + [
            'slug' => $slug,
            'update_user_id' => auth()->id(),
        ]);
        session()->flash('success', 'Article Added');

        return redirect()->back();
    }

    public function uploadImage(UploadArticleImageRequest $req, Article $article)
    {
    }

    public function update(UpdateArticleRequest $req, Article $article)
    {
        $values = $req->validated();
        $slug = Str::slug($values['title']);

        $found = true;
        $temp = $slug;
        while ($found) {
            $exists = Article::where('slug', $temp)->first();
            if ($exists) {
                $temp = $slug . '-' . random_int(1, 999);
            } else {
                $found = false;
            }
        }
        $slug = $temp;
        $article->update($values + [
            'slug' => $slug,
            'update_user_id' => auth()->id(),
        ]);
        session()->flash('success', 'Article Updated');

        return redirect()->back();
    }

    public function delete(Article $article)
    {
        $article->delete();
        session()->flash('success', 'Article Deleted');

        return redirect()->back();
    }
}
