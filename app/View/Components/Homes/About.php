<?php

namespace App\View\Components\Homes;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class About extends Component
{
    public function __construct()
    {

    }

    public function render(): View
    {
        return view('components.homes.about');
    }
}
