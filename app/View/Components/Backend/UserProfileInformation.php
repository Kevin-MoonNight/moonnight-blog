<?php

namespace App\View\Components\Backend;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class UserProfileInformation extends Component
{
    public string $name, $username, $email, $profile_photo_url;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $user = Auth::user();
        $this->name= $user->name;
        $this->username= $user->username;
        $this->email= $user->email;
        $this->profile_photo_url= $user->profile_photo_url;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.backend.user-profile-information');
    }
}
