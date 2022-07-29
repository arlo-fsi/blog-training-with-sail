<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Button extends Component
{
    public $label;
    public $type;
    public $btnType;

    /**
     * Create a new component instance.
     *
     * @param string $label
     * @param string $type = 'submit|button'
     * @param string $btnType = 'primary|info|warning|danger|success'
     * @return void
     */
    public function __construct($label = 'Submit', $type = 'submit', $btnType = 'primary')
    {
        $this->label = $label;
        $this->type = $type;
        $this->btnType = $btnType;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.button');
    }
}
