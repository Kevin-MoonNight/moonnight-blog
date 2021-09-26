<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Facades\Validator;


class ArticlesAPIController extends Controller
{
    public function __construct(){
        $this->middleware('auth:sanctum')->only('store','update','destroy');
    }

    public function index()
    {
        $articles = Article::with('user','tags')->where('state','published')->latest()->paginate(10);

        return response($articles,200);
    }

    public function store(Request $request)
    {
        //驗證資料
        $validator = Validator::make($request->all(), [
            'title' =>['required', 'string','max:255'],
            'content'=>['required', 'string'],
            'url'=>['url'],
            'state'=>['required', 'string']
        ]);

        //驗證失敗
        if ($validator->fails()) {
            return response(['errors'=>true,'data'=> $validator->errors()],200);
        }

        //新增文章
        $article = auth()->user()->articles()->create($request->all());

        //儲存標籤
        $tags = $request->input('tags');

        if($tags !== null){
            foreach ($tags as $index){
                $tag = Tag::find($index);

                if($tag !== null){
                    $article->tags()->attach($tag);
                }
            }
        }

        return response(['errors'=>false],201);
    }

    public function show($id)
    {
        $article = Article::with('tags','user')->find($id);

        if($article === null){
            return response(['errors'=>true],200);
        }

        //新增觀看數
        $article->views +=1;
        //更新文章
        $article->save();

        return response($article,200);
    }

    public function update(Request $request, $id)
    {
        //驗證資料
        $validator = Validator::make($request->all(), [
            'title' =>['required', 'string','max:255'],
            'content'=>['required', 'string'],
            'url'=>['url'],
            'state'=>['required', 'string']
        ]);

        //驗證失敗
        if ($validator->fails()) {
            return response(['errors'=>true,'data'=> $validator->errors()],200);
        }

        //尋找文章
        $article = Article::find($id);

        //更新文章
        $article->update($request->all());

        //刪除先前的標籤
        $article->tags()->detach();

        //儲存標籤
        $tags = $request->input('tags');

        //更新tag
        if($tags !== null){
            foreach ($tags as $index){
                $tag = Tag::find($index);

                if($tag !== null){
                    $article->tags()->attach($tag);
                }
            }
        }

        return response(['errors'=>false],200);
    }

    public function destroy($id)
    {
        $article = Article::find($id);

        if($article === null){
            return response(['errors'=>true],200);
        }

        //刪除文章
        $article->delete();

        return response(['errors'=> false],200);
    }

    public function search($text)
    {
        $articles = Article::with('user','tags')->where('title','like', '%' . $text . '%')->latest()->paginate(10);

        return response($articles,200);
    }

    public function searchTag($name){
        //驗證資料
        $validator = Validator::make(['name' => $name], [
            'name' =>['required', 'string','exists:tags,name']
        ]);

        //如果沒有找到標籤
        if($validator->fails()){
            return response(['errors'=>true,'data'=> $validator->errors()],200);
        }

        $tag = Tag::where('name',$name)->first();

        $articles = $tag->articles()->with('user','tags')->latest()->paginate(10);

        return response($articles,200);
    }

    public function popular(){
        $articles = Article::with('user','tags')->where('state','published')->orderBy('views','desc')->take(10)->get();

        return response($articles,200);
    }

    public function draft(){

    }

    public function softDelete(){

    }
}
