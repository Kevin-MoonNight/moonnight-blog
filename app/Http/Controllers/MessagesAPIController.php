<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessagesAPIController extends Controller
{
    public function __construct(){
        $this->middleware('auth:sanctum')->except('create','store');
    }

    public function index()
    {
        $messages = Message::latest()->paginate(10);

        return response($messages,200);
    }

    public function store(Request $request)
    {
        //驗證資料
        $validator = Validator::make($request->all(), [
            'name' =>['required', 'string','max:255'],
            'email'=>['required','email', 'string','max:255'],
            'remark'=>['max:500'],
            'caseType'=>['required', 'string']
        ]);

        //驗證失敗
        if ($validator->fails()) {
            return response(['errors'=>true,'data'=> $validator->errors()],200);
        }

        Message::Create($request->all());

        return response(['errors'=>false,'notice'=>'訊息發送成功，請留意信箱!'],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //驗證資料是否存在於資料庫
        $validator = Validator::make([$id], [
            ['required', 'numeric','exists:messages,id'],
        ]);

        //驗證失敗
        if ($validator->fails()) {
            return response(['errors'=> true,'data'=> $validator->errors()],200);
        }

        $message = Message::find($id);

        return response(['errors'=>false,'message'=>$message], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,int $id)
    {
        //驗證資料是否存在於資料庫
        $validator = Validator::make([$id], [
            ['required', 'numeric','exists:messages,id'],
        ]);

        //驗證失敗
        if ($validator->fails()) {
            return response(['errors'=> true,'data'=> $validator->errors()],200);
        }

        $message = Message::find($id);


        //驗證資料
        $validator = Validator::make($request->all(), [
            'name' =>['required', 'string','max:255'],
            'email'=>['required','email', 'string','max:255'],
            'remark'=>['string','max:500'],
            'caseType'=>['required', 'string']
        ]);

        //驗證失敗
        if ($validator->fails()) {
            return response(['errors'=>true,'data'=> $validator->errors()],200);
        }

       $message->update($request->all());

        return response(['errors'=>false,'notice'=>'訊息更新成功!'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        //驗證資料是否存在於資料庫
        $validator = Validator::make([$id], [
            ['required', 'numeric','exists:messages,id'],
        ]);

        //驗證失敗
        if ($validator->fails()) {
            return response(['errors'=> true,'data'=> $validator->errors()],200);
        }

        //刪除資料
        $message = Message::find($id);
        $message->delete();

        return response(['errors'=>false,'notice'=>'訊息刪除成功!'], 200);
    }
}
