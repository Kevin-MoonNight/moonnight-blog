<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Models\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'can:admin'])->except('store');
    }

    public function index(Request $request)
    {
        return Message::filter($request->all())->latest()->paginate(10)->withQueryString();
    }

    public function create()
    {
        return view('frontend.contact');
    }

    public function store(StoreMessageRequest $request)
    {
        $validated = $request->validated();

        Message::Create($validated);

        return redirect()->route('messages.create');
    }

    public function show(Message $message)
    {
        return $message;
    }

    public function update(UpdateMessageRequest $request, Message $message)
    {
        $validated = $request->validated();

        return $message->update($validated);
    }

    public function destroy(Message $message)
    {
        return $message->delete();
    }
}
