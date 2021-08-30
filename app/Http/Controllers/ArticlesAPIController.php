<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Tag;


class ArticlesAPIController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('index','show','search','addView','searchTag');
    }

    public function index()
    {
        //獲得所有文章
        $articles = Article::all();

        //獲得其他參數
        foreach ($articles as $article){
            $tags = $article->tags;
            $user = $article->user;
        }

        return response($articles,200);
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

        return response($article,201);
    }

    public function show($id)
    {
        //尋找文章
        $article = Article::all()->find($id);


        if($article === null){
            return response('null',200);
        }

        //新增觀看數
        $article->views +=1;

        //更新文章
        $article->save();

        //獲得其他參數
        $tags = $article->tags;
        $user = $article->user->name;

        return response($article,200);
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
        $tag = Tag::all()->find($request->tag);

        //判斷該tag有無重複
        if ($article->tags->contains($tag) === false){
            $article->tags()->save($tag);
        }

        return $article;
    }

    public function destroy($id)
    {
        //判斷該文章是否屬於該使用者
        $article = auth()->user()->articles->find($id);

        //刪除文章
        $article->delete();
    }

    public function search($name)
    {
        return response(Article::all()->where('name','like', '%'.$name.'%')->first(),200);
    }

    public function searchTag($name){
        //尋找標籤
        $tag = Tag::all()->where('name',$name)->first();

        //如果沒有找到標籤
        if($tag === null){
            return response('null',200);
        }

        $articles = $tag->articles;

        //獲得其他參數
        foreach ($articles as $article){
            $tags = $article->tags;
            $user = $article->user;
        }

        return response( $articles,200);
    }
}
