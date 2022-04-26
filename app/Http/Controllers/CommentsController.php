<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{

    public function index()
    {
        $this->authorize('viewAny', Comment::class);

        $comments = Auth::user()->comments()->latest()->paginate(10);

        return view('articles.comments', ['comments' => $comments]);
    }

    public function store(StoreCommentRequest $request)
    {
        $this->authorize('create', Comment::class);

        $validated = $request->validated();

        $comment = Comment::create($validated);

        return redirect()->route('articles.show', ['article' => $comment->article->slug]);
    }

    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        $this->authorize('update', Comment::class);

        $validated = $request->validated();

        $comment->update($validated);

        return redirect()->route('articles.show', ['article' => $comment->article->slug]);
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $article = $comment->article;

        $comment->delete();

        return redirect()->route('articles.show', ['article' => $article->slug]);
    }
}
