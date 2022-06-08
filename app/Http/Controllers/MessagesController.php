<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Mail\Contacted;
use App\Models\Message;
use Mail;

class MessagesController extends Controller
{
    public function create()
    {
        return view('frontend.contact');
    }

    public function store(StoreMessageRequest $request)
    {
        $validated = $request->validated();

        $domain = last(explode('@', $validated['email']));
        if ($domain !== "gmail.com") {
            return redirect()->route('contact')->with('message', '訊息傳送失敗，請使用Gmail帳號!');
        } else {
            Message::create($validated);
            Mail::to($validated['email'])->send(new Contacted());
            return redirect()->route('contact')->with('message', '訊息傳送成功，我們會盡快回覆您!');
        }
    }
}
