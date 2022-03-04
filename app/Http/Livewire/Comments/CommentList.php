<?php

namespace App\Http\Livewire\Comments;

use App\Models\Article;
use Livewire\Component;

class CommentList extends Component
{
    public Article $article;

    public function mount(Article $article)
    {
        $this->article = $article;
    }

    public function render()
    {
        return view('livewire.comments.comment-list');
    }
}
