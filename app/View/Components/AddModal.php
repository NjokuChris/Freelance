<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AddModal extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title;
    public $routeName;

    public function __construct($title, $routeName)
    {
        //
        $this->title = $title;
        $this->routeName = $routeName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.add-modal');
    }
}
