<?php

namespace App\View\Components\Form;

use App\Http\Controllers\ImagesController;
use Auth;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class AvatarSelector extends Component
{
    public String $name, $default;
    public Collection $avatars;

    public function __construct($name)
    {
        $this->name = $name;
        $this->default = Auth::user()->profile_photo_url;
        $this->avatars = ImagesController::getAvatars();
    }

    public function render(): View
    {
        return view('components.form.avatar-selector');
    }
}
