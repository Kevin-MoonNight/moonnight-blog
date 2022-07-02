<?php

namespace App\Http\Livewire\Articles\Comments;

use App\Models\Comment;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CommentReply extends Component
{
    public Comment $comment;
    public bool $openReplies;

    public function mount(Comment $comment)
    {
        $this->comment = $comment;
        $this->openReplies = false;
    }

    public function openReplies()
    {
        $this->openReplies = true;
    }

    public function closeReplies()
    {
        $this->openReplies = false;
    }

    public function render(): View
    {
        return view('livewire.articles.comments.comment-reply');
    }
}
