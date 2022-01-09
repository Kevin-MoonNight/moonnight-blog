<?php

namespace App\View\Components;

use App\Http\Controllers\ArticlesController;
use Illuminate\View\Component;

class PopularArticlesSideBox extends Component
{

    private $articlesService;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(ArticlesController $articlesService)
    {
        $this->articlesService = $articlesService;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $articles = $this->articlesService->popular();

        return view('components.popular-articles-side-box', ['articles' => $articles]);
    }
}
