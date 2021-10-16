<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagsController extends Controller
{
    public function __construct(){
        $this->middleware('auth:sanctum')->except('index');
    }

    public function index()
    {
        $tags = Tag::all();

        return response($tags,200);
    }

    public function store(Request $request)
    {
        $ok=true;
        $msg = '標籤新增成功!';
        $error='';
        try{
            //驗證內容
            $content = $request->validate([
                'name'=>'required'
            ]);

            Tag::create($content);
        }catch (Exception $e){
            $ok = false;
            $msg = '標籤新增失敗!';
            $error = $e;
        }

        return response()->json(['ok' => $ok, 'msg' => $msg,'error'=>$error], 200);;
    }

    public function show($id)
    {
        return Tag::all()->find($id);
    }

    public function update(Request $request, $id)
    {
        $content = $request->validate([
            'name'=>'required'
        ]);

        $tag = Tag::all()->find($id);
        $tag->update($content);

        return $tag;
    }

    public function destroy($id)
    {
        return Tag::destroy($id);
    }

    public function search($name)
    {
        return Tag::where('name','like', '%'.$name.'%')->get();
    }
}
