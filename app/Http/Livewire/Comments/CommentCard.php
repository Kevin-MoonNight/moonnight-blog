<?php

namespace App\Http\Livewire\Comments;

use App\Models\Comment;
use Livewire\Component;

class CommentCard extends Component
{
    public Comment $comment;
    public bool $openReplies;
    public int $counter;

    public function mount(Comment $comment)
    {
        $this->comment = $comment;
        $this->openReplies = false;
        $this->counter = 0;
    }

    public function clickReplies()
    {
        $this->openReplies = !$this->openReplies;
    }

    public function replyComment()
    {
        $this->counter++;
        $this->emit('setReplyCommentId', $this->comment->id);
    }

    public function render()
    {
        return view('livewire.comments.comment-card');
    }
}
