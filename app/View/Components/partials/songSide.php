<?php

namespace App\View\Components\partials;

use Illuminate\View\Component;

class songSide extends Component
{
    public $popularmusics;
    public $popularArtists;
    public $content;
    public $title;
    public $user;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($popularmusics,$popularArtists,$content="",$title,$user)
    {
        $this->popularmusics=$popularmusics;
        $this->popularArtists=$popularArtists;
        $this->content=$content;
        $this->title=$title;
        $this->user=$user;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.partials.song-side');
    }
}
