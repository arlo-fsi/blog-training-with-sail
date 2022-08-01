<?php

namespace App\Interfaces;

use App\Models\Article;
use Illuminate\Http\Request;

use App\Http\Requests\{
    CreateArticleRequest,
    UpdateArticleRequest,
    UploadArticleImageRequest
};

interface ArticleInterface
{
    public function list(Request $req);

    public function create(CreateArticleRequest $req);

    public function uploadImage(UploadArticleImageRequest $req);

    public function update(UpdateArticleRequest $req, Article $article);

    public function delete(Article $article);
}
