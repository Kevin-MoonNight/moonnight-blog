<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Models\Message;

class MessagesController extends Controller
{
    public function create()
    {
        return view('frontend.contact');
    }

    public function store(StoreMessageRequest $request)
    {
        $validated = $request->validated();

        Message::create($validated);

        return redirect()->route('contact')->with('message', '訊息傳送成功，我們會盡快回覆您!');
    }
}
