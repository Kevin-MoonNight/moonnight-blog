<?php

namespace App\Mail;

use App\Http\Controllers\ImagesController;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Lang;

class Contacted extends Mailable
{
    use Queueable, SerializesModels;

    public string $actionUrl, $actionText;
    public array $introLines;
    public string $catImage;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->actionUrl = env('APP_URL');
        $this->actionText = Lang::get('前往網站');
        $this->introLines = [
            '我們是慕耐程式工作室，謝謝您選擇我們的服務。',
            '我們盡快會有專人向您聯絡!'
        ];

        $this->catImage = ImagesController::getRandomCatImageUrl();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.contact.contacted');
    }
}
