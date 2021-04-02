<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MasterLayout extends Component
{
    // public $titrePage;
    
    public function __construct()
    {
        // $this->titrePage = $titrePage;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.master');
    }
}
