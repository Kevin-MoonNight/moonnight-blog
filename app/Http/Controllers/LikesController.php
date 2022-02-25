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

        $articles = Auth::user()->likes()->latest()->paginate(10);

        return view('articles.likes', ['articles' => $articles]);
    }

    public function store(StoreLikeRequest $request)
    {
        $this->authorize('create', Like::class);

        $validated = $request->validated();

        return Like::create($validated);
    }

    public function destroy(Article $article)
    {
        $this->authorize('delete', Like::class);

        return $article->likes()->detach(Auth::user());
    }
}
