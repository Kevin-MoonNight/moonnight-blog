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

        return Like::create([
            'article_id' => Article::where('slug',$validated['article_slug'])->first()->id,
            'user_id' => Auth::id()
        ]);
    }

    public function destroy(Article $article)
    {
        $this->authorize('delete', Like::class);

        return $article->likes()->detach(Auth::user());
    }
}
