<?php

namespace App\View\Components\Frontend;

use Illuminate\Support\Facades\Request;
use Illuminate\View\Component;

class Navigation extends Component
{
    public string $currentLink;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->currentLink = Request::url();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend.navigation');
    }
}
