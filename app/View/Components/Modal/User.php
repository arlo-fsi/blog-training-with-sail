<?php

namespace App\View\Components\Modal;

use Illuminate\View\Component;

class User extends Component
{
    public $id;
    public $addMode;
    public $user;
    public $roles;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $id = '', bool $addMode = true, $user = null, $roles = [])
    {
        $this->id = $id;
        $this->addMode = $addMode;
        $this->user = $user;
        $this->roles = $roles;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal.user');
    }
}
