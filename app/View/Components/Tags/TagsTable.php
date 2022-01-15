<?php

namespace App\View\Components\Tags;

use Illuminate\View\Component;

class TagsTable extends Component
{
    public $tags;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tags)
    {
        $this->tags = $tags;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tags.tags-table');
    }
}
