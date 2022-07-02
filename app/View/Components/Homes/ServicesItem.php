<?php

namespace App\View\Components\Homes;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ServicesItem extends Component
{
    public string $title;
    public string $imgLink;

    public function __construct(string $title, string $imgLink)
    {
        $this->title = $title;
        $this->imgLink = $imgLink;
    }

    public function render(): View
    {
        return view('components.homes.services-item');
    }
}
