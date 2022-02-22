<?php

namespace App\View\Components\Layouts;

use Illuminate\View\Component;

class BackendLayout extends Component
{
    public string $title, $description, $keywords;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $title = null, string $description = null, string $keywords = null)
    {
        $this->title = $title !== null ? $title . '-MoonNight 慕耐程式工作室' : env('APP_NAME');
        $this->description = $description !== null ? $description : env('APP_DESCRIPTION');
        $this->keywords = $keywords !== null ? $keywords : env('APP_KEYWORDS');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layouts.backend-layout');
    }
}
