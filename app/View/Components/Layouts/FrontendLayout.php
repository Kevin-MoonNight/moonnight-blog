<?php

namespace App\View\Components\Layouts;

use Illuminate\View\Component;

class FrontendLayout extends Component
{
    public $title;
    public $description;
    public $keywords;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = null, $description = null, $keywords = null)
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
        return view('components.layouts.frontend-layout');
    }

    public function getTitle()
    {
        return $this->title !== null ? $this->title . '-MoonNight 慕耐程式工作室' : env('APP_NAME');
    }

    public function getDescription()
    {
        return $this->description !== null ? $this->description : env('APP_DESCRIPTION');
    }

    public function getKeywords()
    {
        return $this->keywords !== null ? $this->keywords : env('APP_KEYWORDS');
    }
}
