<?php

namespace App\View\Components\Layouts;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ArticlesLayout extends Component
{
    public ?string $title, $description, $keywords;

    public function __construct(string $title = null, string $description = null, string $keywords = null)
    {
        $this->title = $title;
        $this->description = $description;
        $this->keywords = $keywords;
    }

    public function render(): View
    {
        return view('components.layouts.articles-layout');
    }
}
