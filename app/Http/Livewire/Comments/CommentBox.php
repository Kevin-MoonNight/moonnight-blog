<?php

namespace App\Http\Livewire\Comments;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CommentBox extends Component
{
    public Article $article;
    public ?int $parentId;
    public $user;
    public ?Comment $replyComment;

    protected $listeners = ['setReplyCommentId'];

    public function mount(Article $article)
    {
        $this->user = Auth::user();
        $this->article = $article;
        $this->parentId = null;
        $this->replyComment = null;
    }

    public function setReplyCommentId(?int $id)
    {
        $this->parentId = $id;
        $this->replyComment = Comment::find($id);
    }

    public function cancelReply()
    {
        $this->parentId = null;
        $this->replyComment = null;
    }

    public function render()
    {
        return view('livewire.comments.comment-box');
    }
}
