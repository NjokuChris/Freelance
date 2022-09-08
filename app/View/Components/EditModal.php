<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EditModal extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title;
    public $id;
    public $formation;
    public $status;
    public $routeName;

    public function __construct($title, $id, $formation, $status, $routeName)
    {
        //
        $this->title = $title;
        $this->id = $id;
        $this->formation = $formation;
        $this->status = $status;
        $this->routeName = $routeName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.edit-modal');
    }
}
