<?php

namespace App\View\Components\Homes;

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

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.homes.services-item');
    }
}
