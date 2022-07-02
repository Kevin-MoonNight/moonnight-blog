<?php

namespace App\View\Components\Layouts;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FrontendLayout extends Component
{
    public string $title, $description, $keywords;

    public function __construct(string $title = null, string $description = null, string $keywords = null)
    {
        $this->title = $title !== null ? $title . '-MoonNight 慕耐程式工作室' : env('APP_NAME');
        $this->description = $description !== null ? $description : env('APP_DESCRIPTION');
        $this->keywords = $keywords !== null ? $keywords : env('APP_KEYWORDS');
    }

    public function render(): View
    {
        return view('components.layouts.frontend-layout');
    }
}
