<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateArticleRequest;
use App\Http\Requests\StoreArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'can:admin'])->except('index','show','popular');
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
            $this->attachTag($article, $validated['tags']);
        }

        return $article;
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);

        //新增觀看數
        $article->views += 1;
        //更新文章
        $article->save();

        return $article;
    }

    public function update(UpdateArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);

        $validated = $request->validated();

        $validated['thumbnail'] = $this->saveThumbnail($validated['thumbnail'], $article);

        $validated['user_id'] = auth()->id();

        $article->update($validated);

        if (isset($validated['tags'])) {
            $this->attachTag($article, $validated['tags']);
        }

        return $article;
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        return $article->delete();
    }

    public function popular()
    {
        return Article::popular()->take(10)->get();
    }

    public function draft(Request $request)
    {
        return Article::draft()->filter($request->all())->latest()->paginate(10)->withQueryString();
    }

    public function trashed(Request $request)
    {
        return Article::onlyTrashed()->filter($request->all())->paginate(10)->withQueryString();
    }

    public function restore($id)
    {
        return Article::onlyTrashed()->findOrFail($id)->restore();
    }

    public function deleteTrashed($id)
    {
        $article = Article::onlyTrashed()->findOrFail($id);

        $this->deleteThumbnail($article);

        return $article->forceDelete();
    }

    private function saveThumbnail($thumbnail, $article = null)
    {
        if (isset($thumbnail)) {
            if (isset($article)) {
                $this->deleteThumbnail($article);
            }
            $imagePath = "storage/" . $thumbnail->store('thumbnail');
            $resizeImage = Image::make(public_path($imagePath))->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $resizeImage->save(public_path($imagePath), 60);
            $resizeImage->save();
        } else {
            $imagePath = $article->thumbnail;
        }

        return $imagePath;
    }

    private function deleteThumbnail($article)
    {
        Storage::delete(Str::of($article->thumbnail)->remove('storage/'));
    }

    private function attachTag($article, $tags)
    {
        //刪除先前的標籤
        $article->tags()->detach();

        collect($tags)
            ->map(function ($tag) use ($article) {
                $tag = Tag::findOrFail($tag);
                $article->tags()->attach($tag);
            });
    }
}
