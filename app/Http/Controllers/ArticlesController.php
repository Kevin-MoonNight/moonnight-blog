<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;

class ArticlesController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('index','show','search','addView','searchTag');
    }


    public function index()
    {
        $articles = Article::with('user','tags')->orderBy('id','desc')->paginate(9);

        return view('frontend.articleList',['articles' => $articles]);
    }


    public function create()
    {
        $tags = Tag::all();

        return view('articles.create',['tags' => $tags]);
    }


    public function store(Request $request)
    {
        //驗證內容
        $content = $request->validate([
            'title' =>'required',
            'content'=>'required',
            'state' =>'required'
        ]);

        //新增文章
        $article = auth()->user()->articles()->create($content);

        //儲存標籤
        $tag = Tag::all()->find($request->tag);
        $article->tags()->save($tag);

        return redirect('root')->with(['notice'=>'文章新增成功!']);
    }


    public function show($id)
    {
        $article = Article::find($id);

        if($article === null){
            return redirect()->route('articles.index')->with(['error'=>'尋找不到文章!']);
        }

        //新增觀看數
        $article->views +=1;
        //更新文章
        $article->save();

        return view('articles.show',['article'=>$article]);
    }


    public function edit($id)
    {
        $article = auth()->user()->articles()->find($id);
        $tags = Tag::all();

        return view('articles.edit',['article' => $article,'tags'=> $tags]);
    }


    public function update(Request $request, $id)
    {
        //尋找文章
        $article = auth()->user()->articles->find($id);

        //驗證內容
        $content = $request->validate([
            'title' =>'required',
            'content'=>'required',
            'state' =>'required'
        ]);

        //更新文章
        $article->update($content);

        //更新tag
        $tag = Tag::find($request->tag);

        //判斷該tag有無重複
        if ($article->tags->contains($tag) === false){
            $article->tags()->save($tag);
        }

        return redirect('dashboard.articles')->with(['notice'=>'文章更新成功!']);
    }


    public function destroy($id)
    {
        //判斷該文章是否屬於該使用者
        $article = auth()->user()->articles->find($id);

        //刪除文章
        $article->delete();
        return redirect('dashboard.articles')->with(['notice'=>'文章刪除成功!']);
    }


    public function search(Request $request)
    {
        $request->validate([
            'text'=>'required'
        ]);

        $text = $request->input('text');

        $articles = Article::with('user','tags')->where('title','like', '%' . $text . '%')->orderBy("created_at", 'desc')->paginate(9);

        if($articles->count() === 0){
            return redirect()->route('articles.index')->with(['error'=>'尋找不到文章!']);
        }

        return view('frontend.articleList',['articles' => $articles]);
    }

    public function searchTag($name){
        //尋找標籤

        $tag = Tag::where('name',$name)->first();

        if($tag === null){
            //如果沒有找到標籤
            return redirect()->route('articles.index')->with(['error'=>'尋找不到文章!']);
        }

        $articles = $tag->articles()->with('user','tags')->orderBy('id','desc')->paginate(9);

        return view('frontend.articleList',['articles' => $articles]);
    }
}
