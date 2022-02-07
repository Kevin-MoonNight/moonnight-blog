<?php

namespace App\Repositories;

use App\Models\Message;
use Illuminate\Database\Eloquent\Model;

class MessageRepository
{
    private Model $message;

    public function __construct()
    {
        $this->message = app(Message::class);
    }

    public function getMessages(array $filters)
    {
        return $this->message->filter($filters)->latest()->paginate(10)->withQueryString();
    }
}
