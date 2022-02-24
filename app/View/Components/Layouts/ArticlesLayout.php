<?php

namespace App\View\Components\Layouts;

use Illuminate\View\Component;

class ArticlesLayout extends Component
{
    public ?string $title, $description, $keywords;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $title = null, string $description = null, string $keywords = null)
    {
        $this->title = $title;
        $this->description = $description;
        $this->keywords = $keywords;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layouts.articles-layout');
    }
}
