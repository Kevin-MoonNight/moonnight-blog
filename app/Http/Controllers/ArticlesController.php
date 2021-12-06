<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateArticleRequest;
use App\Http\Requests\StoreArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except('index', 'show', 'popular');
    }

    public function index(Request $request)
    {
        return Article::published()->filter($request->all())->latest()->paginate(10)->withQueryString();
    }

    public function store(StoreArticleRequest $request)
    {
        $validated = $request->validated();

        $validated['thumbnail'] = $this->saveThumbnail($validated['thumbnail']);

        $validated['user_id'] = auth()->id();

        $article = Article::create($validated);

        if (isset($validated['tags'])) {
            $article->tags()->attach($validated['tags']);
        }

        return $article;
    }

    public function getArticle(Article $article)
    {
        if (Gate::any(['admin', 'article'], $article)) {
            return $article->makeVisible('state');
        } else {
            abort(404);
        }
    }

    public function show(Article $article)
    {
        if ($article->getAttribute('state')) {
            //新增觀看數
            $article->views += 1;
            //更新文章
            $article->save();

            return $article;
        } else {
            abort(404);
        }
    }

    public function update(UpdateArticleRequest $request, Article $article)
    {
        $validated = $request->validated();

        $validated['thumbnail'] = isset($validated['thumbnail']) ? $this->saveThumbnail($validated['thumbnail'], $article) : $article->thumbnail;

        $validated['user_id'] = $article->user_id;

        $article->update($validated);

        if (isset($validated['tags'])) {
            $article->tags()->detach();
            $article->tags()->attach($validated['tags']);
        }

        return $article;
    }

    public function destroy(Article $article)
    {
        if (Gate::any(['admin', 'article'], $article)) {
            return $article->delete();
        } else {
            abort(403);
        }
    }

    public function popular()
    {
        return Article::published()->popular()->take(10)->get();
    }

    public function draft(Request $request)
    {
        if (Gate::allows('admin')) {
            return Article::draft()->filter($request->all())->latest()->paginate(10)->withQueryString();
        } else {
            return auth()->user()->articles()->draft()->filter($request->all())->latest()->paginate(10)->withQueryString();
        }
    }

    public function trashed(Request $request)
    {
        if (Gate::allows('admin')) {
            return Article::onlyTrashed()->filter($request->all())->paginate(10)->withQueryString();
        } else {
            return auth()->user()->articles()->onlyTrashed()->filter($request->all())->paginate(10)->withQueryString();
        }
    }

    public function restore(Article $article)
    {
        if (Gate::any(['admin', 'article'], $article)) {
            return Article::onlyTrashed()->findOrFail($article->id)->restore();
        } else {
            abort(403);
        }
    }

    public function deleteTrashed(Article $article)
    {
        if (Gate::any(['admin', 'article'], $article)) {
            return Article::onlyTrashed()->findOrFail($article->id)->forceDelete();
        } else {
            abort(403);
        }
    }

    private function saveThumbnail($thumbnail, $article = null)
    {
        if (isset($article)) {
            (new ImagesController)->destroy($article->thumbnail);
        }

        return (new ImagesController)->create($thumbnail);
    }
}
