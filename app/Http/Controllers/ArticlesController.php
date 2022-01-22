<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateArticleRequest;
use App\Http\Requests\StoreArticleRequest;
use App\Models\Article;
use App\Models\Tag;
use App\Repositories\ArticleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    private ImagesController $imageService;
    private ArticleRepository $articleRepository;

    public function __construct(ImagesController $imageService, ArticleRepository $articleRepository)
    {
        $this->imageService = $imageService;
        $this->articleRepository = $articleRepository;
    }

    public function index(Request $request)
    {
        $this->authorize('viewAny', Article::class);

        $articles = $this->articleRepository->getPublishedArticles($request->all());

        return view('frontend.articles', ['articles' => $articles]);
    }

    public function dashboard(Request $request)
    {
        $this->authorize('dashboard', Article::class);

        $articles = $this->articleRepository->getUserPublishedArticles(Auth::user(), $request->all());

        return view('backend.articles', ['articles' => $articles]);
    }

    public function create()
    {
        $this->authorize('create', Article::class);

        return view('articles.create', ['tags' => Tag::all()]);
    }

    public function store(StoreArticleRequest $request)
    {
        $this->authorize('create', Article::class);

        $validated = $request->validated();

        $validated['thumbnail'] = $this->saveThumbnail($validated['thumbnail']);

        $validated['user_id'] = Auth::id();

        $article = Article::create($validated);

        if (isset($validated['tags'])) {
            $article->tags()->attach($validated['tags']);
        }

        return redirect()->route('dashboard.articles.index');
    }

    public function show(Article $article)
    {
        $this->authorize('view', $article);

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
        $this->authorize('update', $article);

        return view('articles.edit', ['article' => $article, 'tags' => Tag::all()]);
    }

    public function update(UpdateArticleRequest $request, Article $article)
    {
        $this->authorize('update', $article);

        $validated = $request->validated();

        $validated['thumbnail'] = isset($validated['thumbnail']) ? $this->saveThumbnail($validated['thumbnail'], $article) : $article->thumbnail;

        $validated['user_id'] = $article->user_id;

        $article->update($validated);

        if (isset($validated['tags'])) {
            $article->tags()->attach($validated['tags']);
        }

        return redirect()->route('dashboard.articles.index');
    }

    public function destroy(Article $article)
    {
        $this->authorize('delete', $article);

        $article->delete();

        return redirect()->route('dashboard.articles.index');
    }

    public function draft(Request $request)
    {
        $this->authorize('draft', Article::class);

        $articles = $this->articleRepository->getUserDraftArticles(Auth::user(), $request->all());

        return view('articles.draft', ['articles' => $articles]);
    }

    public function trashed(Request $request)
    {
        $this->authorize('trashed', Article::class);

        $articles = $this->articleRepository->getUserTrashedArticles(Auth::user(), $request->all());

        return view('articles.trashed', ['articles' => $articles]);
    }

    public function restore(Article $article)
    {
        $this->authorize('restore', $article);

        $article->restore();

        return redirect()->route('dashboard.articles.trashed');
    }

    public function forceDelete(Article $article)
    {
        $this->authorize('forceDelete', $article);

        $article->forceDelete();

        return redirect()->route('dashboard.articles.trashed');
    }

    private function saveThumbnail($thumbnail, $article = null)
    {
        if (isset($article)) {
            $this->imageService->destroy($article->thumbnail);
        }

        return $this->imageService->create($thumbnail);
    }
}
