<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;
use \Illuminate\Contracts\View\View;

class Captcha extends Component
{
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function render(): View
    {
        return view('components.form.captcha');
    }
}
