<?php

namespace App\View\Components\Frontend;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;
use Illuminate\View\Component;

class Navigation extends Component
{
    public string $currentLink;

    public function __construct()
    {
        $this->currentLink = Request::url();
    }

    public function render(): View
    {
        return view('components.frontend.navigation');
    }
}
