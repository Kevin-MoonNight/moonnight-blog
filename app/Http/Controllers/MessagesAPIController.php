<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessagesAPIController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->only('index','destroy');
    }

    public function index()
    {
        return Message::all();
    }

    public function store(Request $request)
    {
        $msg = '訊息發送成功，請留意信箱!';

        //驗證內容
        $request->validate([
            'name' =>'required',
            'email'=>'required',
            'caseType'=>'required'
        ]);

        //新增訊息
        Message::Create($request->all());


        return response($msg,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ok=true;
        $msg = '訊息刪除成功!';
        $error='';

        try{
            $message = Message::find($id);

            $message->delete();
        }catch (Exception $e){
            $ok = false;
            $msg = '訊息刪除失敗!';
            $error = $e;
        }

        return response()->json(['ok' => $ok, 'msg' => $msg,'error'=>$error], 200);
    }
}
