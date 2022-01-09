<?php

namespace App\View\Components;

use Carbon\Carbon;
use Illuminate\View\Component;

class ArticlesTable extends Component
{
    public $articles;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($articles)
    {
        $this->articles = $articles;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.articles-table');
    }
}
