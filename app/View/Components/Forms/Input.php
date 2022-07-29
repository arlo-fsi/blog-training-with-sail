<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Input extends Component
{
    public $id;
    public $label;
    public $value;
    public $type;
    public $placeholder;

    /**
     * Create a new component instance.
     *
     * @param string $id
     * @param string $label = ''
     * @param string $value = ''
     * @param string $type = 'text|email|password|number'
     * @param string $placeholder = ''
     * @return void
     */
    public function __construct($id, $label = '', $value = '', $type = 'text', $placeholder = '')
    {
        $this->id = $id;
        $this->label = $label;
        $this->value = $value;
        $this->type = $type;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.input');
    }
}
