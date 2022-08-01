<?php

namespace App\Http\Controllers;

use App\Interfaces\ArticleInterface;
use App\Models\Article;
use Illuminate\Http\Request;

use App\Http\Requests\{
    CreateArticleRequest,
    UpdateArticleRequest,
    UploadArticleImageRequest
};

class ArticleController extends Controller
{
    private $article;

    public function __construct(ArticleInterface $article)
    {
        $this->article = $article;
    }

    public function list(Request $req)
    {
        return $this->article->list($req);
    }

    public function create(CreateArticleRequest $req)
    {
        return $this->article->create($req);
    }

    public function uploadImage(UploadArticleImageRequest $req)
    {
        return $this->article->uploadImage($req);
    }

    public function update(UpdateArticleRequest $req, Article $article)
    {
        return $this->article->update($req, $article);
    }

    public function delete(Article $article)
    {
        return $this->article->delete($article);
    }
}
