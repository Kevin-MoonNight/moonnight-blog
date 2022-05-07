<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SearchBox extends Component
{
    public string $name;
    public string $link;

    public function __construct(string $name, string $link)
    {
        $this->name = $name;
        $this->link = $link;
    }

    public function render(): View
    {
        return view('components.search-box');
    }
}
