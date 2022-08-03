<?php

namespace App\View\Components\Blog;

use App\Models\Blog;
use Illuminate\View\Component;

class Card extends Component
{
    public $blog;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blog.card');
    }
}
