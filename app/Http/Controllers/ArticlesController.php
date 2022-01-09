<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateArticleRequest;
use App\Http\Requests\StoreArticleRequest;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ArticlesController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::published()->filter($request->all())->latest()->paginate(10)->withQueryString();

        if ($request->route()->named('dashboard.articles.index')) {
            if (Gate::denies('admin')) {
                $articles = auth()->user()->articles();
                $articles = $articles->published()->filter($request->all())->latest()->paginate(10)->withQueryString();
            }

            return view('backend.articles', ['articles' => $articles]);
        } else {
            return view('frontend.articles', ['articles' => $articles]);
        }
    }

    public function create()
    {
        return view('articles.create', ['tags' => Tag::all()]);
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

        return redirect()->route('dashboard.articles.index');
    }

    public function show(Article $article)
    {
        if ($article->getAttribute('state')) {
            //新增觀看數
            $article->views += 1;
            //更新文章
            $article->save();

            return view('articles.show', ['article' => $article]);
        } else {
            abort(404);
        }
    }

    public function edit(Article $article)
    {
        if (Gate::any(['admin', 'article'], $article)) {
            return view('articles.edit', ['article' => $article, 'tags' => Tag::all()]);
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

        return redirect()->route('dashboard.articles.index');
    }

    public function destroy(Article $article)
    {
        if (Gate::any(['admin', 'article'], $article)) {
            $article->delete();
        }

        return redirect()->route('dashboard.articles.index');
    }

    public function popular()
    {
        return Article::published()->popular()->take(10)->get();
    }

    public function draft(Request $request)
    {
        if (Gate::allows('admin')) {
            $articles = Article::draft()->filter($request->all())->latest()->paginate(10)->withQueryString();
        } else {
            $articles = auth()->user()->articles()->draft()->filter($request->all())->latest()->paginate(10)->withQueryString();
        }

        return view('articles.draft', ['articles' => $articles]);
    }

    public function trashed(Request $request)
    {
        if (Gate::allows('admin')) {
            $articles = Article::onlyTrashed()->filter($request->all())->paginate(10)->withQueryString();
        } else {
            $articles = auth()->user()->articles()->onlyTrashed()->filter($request->all())->paginate(10)->withQueryString();
        }

        return view('articles.trashed', ['articles' => $articles]);
    }

    public function restore(Article $article)
    {
        if (Gate::any(['admin', 'article'], $article)) {
            Article::onlyTrashed()->findOrFail($article->id)->restore();
        }

        return redirect()->route('dashboard.articles.trashed');
    }

    public function deleteTrashed(Article $article)
    {
        if (Gate::any(['admin', 'article'], $article)) {
            Article::onlyTrashed()->findOrFail($article->id)->forceDelete();
        }

        return redirect()->route('dashboard.articles.trashed');
    }

    private function saveThumbnail($thumbnail, $article = null)
    {
        if (isset($article)) {
            (new ImagesController)->destroy($article->thumbnail);
        }

        return (new ImagesController)->create($thumbnail);
    }
}
