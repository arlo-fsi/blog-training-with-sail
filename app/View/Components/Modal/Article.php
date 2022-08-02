<?php

namespace App\View\Components\Modal;

use Illuminate\View\Component;

class Article extends Component
{
    public $id;
    public $addMode;
    public $categories;
    public $article;
    public $articleCategoryId;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $id = '', bool $addMode = true, $categories, $article = null)
    {
        $this->id = $id;
        $this->addMode = $addMode;
        $this->categories = $categories;
        $this->article = $article;
        $this->articleCategoryId = $article == null ? null : $article->article_category_id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal.article');
    }
}
