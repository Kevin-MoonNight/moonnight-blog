<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ButtonPrimary extends Component
{
    public string $link;

    public function __construct(string $link)
    {
        $this->link = $link;
    }

    public function render(): View
    {
        return view('components.button-primary');
    }
}
