<?php

namespace App\Http\Livewire\Articles\Comments;

use App\Models\Comment;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CommentCard extends Component
{
    public Comment $comment;

    public function mount(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function replyComment()
    {
        $this->emit('setReplyCommentId', $this->comment->id);
    }

    public function render(): View
    {
        return view('livewire.articles.comments.comment-card');
    }
}
