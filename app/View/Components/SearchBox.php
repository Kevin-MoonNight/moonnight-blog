<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SearchBox extends Component
{
    public $name;
    public $link;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $link)
    {
        $this->name = $name;
        $this->link = $link;
    }

    public function render()
    {
        return view('components.search-box');
    }
}
