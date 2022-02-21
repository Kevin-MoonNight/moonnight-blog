<?php

namespace App\View\Components\Form;

use App\Http\Controllers\ImagesController;
use Illuminate\View\Component;

class AvatarsSelector extends Component
{
    public String $name, $value;
    public \Illuminate\Support\Collection $avatars;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $value)
    {
        $this->name = $name;
        $this->value = $value;
        $this->avatars = ImagesController::getAvatars();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.avatars-selector');
    }
}
