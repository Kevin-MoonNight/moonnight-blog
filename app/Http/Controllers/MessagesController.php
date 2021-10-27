<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Models\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function __construct(){
        $this->middleware('auth:sanctum')->except('store');
    }

    public function index(Request $request)
    {
        return Message::filter($request->all())->latest()->paginate(10);
    }

    public function store(StoreMessageRequest $request)
    {
        $validated = $request->validated();

        return Message::Create($validated);
    }

    public function show($id)
    {
        return Message::findOrFail($id);
    }

    public function update(UpdateMessageRequest $request,$id)
    {
        $message = Message::findOrFail($id);

        $validated = $request->validated();

        $message->update($validated);

        return $message;
    }

    public function destroy($id)
    {
        $message = Message::findOrFail($id);

        return $message->delete();
    }
}
