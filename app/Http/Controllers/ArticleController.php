<?php

namespace App\Http\Controllers;



class ArticleController extends Controller
{
    public function list()
    {
        return view('article.list');
    }
}
