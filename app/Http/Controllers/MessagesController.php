<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Models\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function index(Request $request)
    {
        $messages = Message::filter($request->all())->latest()->paginate(10)->withQueryString();

        return view('backend.messages', ['messages' => $messages]);
    }

    public function create()
    {
        return view('frontend.contact');
    }

    public function store(StoreMessageRequest $request)
    {
        $validated = $request->validated();

        Message::Create($validated);

        return redirect()->route('contact');
    }

    public function show(Message $message)
    {
        return $message;
    }

    public function edit(Message $message)
    {
        return view('messages.edit', ['message' => $message]);
    }

    public function update(UpdateMessageRequest $request, Message $message)
    {
        $validated = $request->validated();

        $message->update($validated);

        return redirect()->route('dashboard.messages.index');
    }

    public function destroy(Message $message)
    {
        $message->delete();

        return redirect()->route('dashboard.messages.index');
    }
}
