<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('create','store');
    }


    public function index()
    {
        $messages = Message::orderBy('id','desc')->paginate(10);

        return view('backend.messages')->with(['messages'=>$messages]);
    }


    public function create()
    {
        return view('frontend.contact');
    }


    public function store(Request $request)
    {
        //驗證內容
        $request->validate([
            'name' =>'required',
            'email'=>'required',
            'caseType'=>'required'
        ]);

        //新增訊息
        Message::Create($request->all());

        return redirect()->route('contact.create')->with(['notice'=>'訊息發送成功，請留意信箱!']);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $message = Message::all()->find($id);

        $message->delete();

        return redirect()->route('contact.index')->with(['notice'=>'訊息刪除成功!']);
    }
}
