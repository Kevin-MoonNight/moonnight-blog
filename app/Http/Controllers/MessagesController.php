<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Models\Message;
use App\Repositories\MessageRepository;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    private MessageRepository $messageRepository;

    public function __construct(MessageRepository $messageRepository)
    {
        $this->messageRepository = $messageRepository;
//        $this->authorizeResource(Message::class);
    }

    public function index(Request $request)
    {
        $this->authorize('viewAny', Message::class);

        $messages = $this->messageRepository->getMessages($request->all());

        return view('backend.messages', ['messages' => $messages]);
    }

    public function create()
    {
        $this->authorize('create', Message::class);

        return view('frontend.contact');
    }

    public function store(StoreMessageRequest $request)
    {
        $this->authorize('create', Message::class);

        $validated = $request->validated();

        Message::Create($validated);

        return redirect()->route('contact');
    }

    public function show(Message $message)
    {
        $this->authorize('view', $message);

        return view('messages.show', $message);
    }

    public function edit(Message $message)
    {
        $this->authorize('update', $message);

        return view('messages.edit', ['message' => $message]);
    }

    public function update(UpdateMessageRequest $request, Message $message)
    {
        $this->authorize('update', $message);

        $validated = $request->validated();

        $message->update($validated);

        return redirect()->route('dashboard.messages.index');
    }

    public function destroy(Message $message)
    {
        $this->authorize('delete', $message);

        $message->delete();

        return redirect()->route('dashboard.messages.index');
    }
}
