<?php

namespace App\View\Components\Modal;

use App\Models\ArticleCategory as ModelsArticleCategory;
use Illuminate\View\Component;

class ArticleCategory extends Component
{
    public $articleCategory;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(ModelsArticleCategory $articleCategory)
    {
        $this->articleCategory = $articleCategory;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal.article-category');
    }
}
