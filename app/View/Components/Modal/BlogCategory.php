<?php

namespace App\View\Components\Modal;

use App\Models\BlogCategory as ModelsBlogCategory;
use Illuminate\View\Component;

class BlogCategory extends Component
{
    public $blogCategory;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(ModelsBlogCategory $blogCategory)
    {
        $this->blogCategory = $blogCategory;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal.blog-category');
    }
}
