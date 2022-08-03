<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Select extends Component
{
    public $id;
    public $label;
    public $list;
    public $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id = '', $label = '', $list, $value = '')
    {
        $this->id = $id;
        $this->label = $label;
        $this->list = $list;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.select');
    }
}
