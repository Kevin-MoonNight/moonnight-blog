<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLikeRequest;
use App\Models\Article;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Like::class);

        $articles = Auth::user()->likes()->get();

        return view('backend.likes', ['articles' => $articles]);
    }

    public function store(StoreLikeRequest $request)
    {
        $this->authorize('create', Like::class);

        $validated = $request->validated();
        $validated['user_id'] = Auth::id();

        return Like::create($validated);
    }

    public function destroy(Article $article)
    {
        $this->authorize('delete', Like::class);

        return $article->likes()->detach(Auth::user());
    }
}
