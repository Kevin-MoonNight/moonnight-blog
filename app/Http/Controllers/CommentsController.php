<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;

class CommentsController extends Controller
{
    public function store(StoreCommentRequest $request)
    {
        $this->authorize('create', Comment::class);

        $validated = $request->validated();

        $comment = Comment::create($validated);

        return redirect()->route('articles.show', ['article' => $comment->article->slug]);
    }
}
