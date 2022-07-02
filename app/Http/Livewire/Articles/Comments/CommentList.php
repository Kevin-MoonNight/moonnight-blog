<?php

namespace App\Http\Livewire\Articles\Comments;

use App\Models\Article;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CommentList extends Component
{
    public Article $article;

    public function mount(Article $article)
    {
        $this->article = $article;
    }

    public function render(): View
    {
        return view('livewire.articles.comments.comment-list');
    }
}
