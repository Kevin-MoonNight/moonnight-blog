<?php

namespace App\View\Components\Contacts;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ContactItem extends Component
{
    public string $title;
    public string $description;

    public function __construct(string $title, string $description)
    {
        $this->title = $title;
        $this->description = $description;
    }

    public function render(): View
    {
        return view('components.contacts.contact-item');
    }
}
