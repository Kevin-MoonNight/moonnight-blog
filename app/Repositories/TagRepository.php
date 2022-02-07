<?php

namespace App\Repositories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;

class TagRepository
{
    private Model $tag;

    public function __construct()
    {
        $this->tag = app(Tag::class);
    }

    public function getTags(array $filters)
    {
        return $this->tag->filter($filters)->latest()->paginate(10)->withQueryString();
    }
}
