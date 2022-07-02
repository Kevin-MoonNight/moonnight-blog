<?php

namespace App\Http\Livewire\Articles\Comments;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CommentBox extends Component
{
    public Article $article;
    public ?Comment $replyComment;

    protected $listeners = ['setReplyCommentId'];

    public function mount(Article $article)
    {
        $this->article = $article;
        $this->replyComment = null;
    }

    public function setReplyCommentId(int $id)
    {
        $this->replyComment = Comment::find($id);
    }

    public function cancelReply()
    {
        $this->replyComment = null;
    }

    public function render(): View
    {
        return view('livewire.articles.comments.comment-box');
    }
}
