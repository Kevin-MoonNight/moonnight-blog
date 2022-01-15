<?php

namespace App\View\Components\Tags;

use App\Models\Tag;
use Illuminate\View\Component;

class TagsSideBox extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tags.tags-side-box', ['tags' => Tag::all()]);
    }


}
