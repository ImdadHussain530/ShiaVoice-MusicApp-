<?php

namespace App\View\Components\partials;

use Illuminate\View\Component;

class menuSide extends Component
{

    public  $musics;
    /**
     * Create a new component instance.
     *
     *
     * @return void
     */
    public function __construct($musics)
    {
        $this->musics = $musics;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.partials.menuSide');
    }
}
