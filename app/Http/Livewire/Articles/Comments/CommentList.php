<?php

namespace App\Http\Livewire\Articles\Comments;

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
        return view('livewire.articles.comments.comment-list');
    }
}
