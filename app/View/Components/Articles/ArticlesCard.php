<?php

namespace App\View\Components\Articles;

use Carbon\Carbon;
use Illuminate\View\Component;

class ArticlesCard extends Component
{
    public $article;
    public $link;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($article, $link)
    {
        $this->article = $article;
        $this->link = $link;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.articles.articles-card');
    }

    public function fromNow($date)
    {
        return Carbon::parse($date)->diffForHumans();
    }
}
