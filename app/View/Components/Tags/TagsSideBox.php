<?php

namespace App\View\Components\Tags;

use App\Models\Tag;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class TagsSideBox extends Component
{
    public Collection $tags;

    public function __construct()
    {
        $this->tags = Tag::all();
    }

    public function render(): View
    {
        return view('components.tags.tags-side-box');
    }
}
