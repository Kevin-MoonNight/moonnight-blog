<?php

namespace App\View\Components\Contacts;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ContactForm extends Component
{
    public function __construct()
    {

    }

    public function render(): View
    {
        return view('components.contacts.contact-form');
    }
}
