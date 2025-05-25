<?php

namespace App\View\Components\Movie;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Carbon as Carbon;
use Illuminate\View\Component;

class Card extends Component
{
    public $index;
    public $title;
    public $releaseDate;
    public $image;
    /**
     * Create a new component instance.
     */
    public function __construct($index, $title, $releaseDate, $image)
    {
        $this->index = $index;
        $this->title = $title;
        $this->releaseDate = $releaseDate;
        $this->image = $image;

        if ($this->isValid()) {
            $this->title = $title;
            $this->releaseDate = Carbon::parse($releaseDate)->format('M d, Y');
            $this->image = $image;
        }
    }

    private function isValid(): bool
    {
        return $this->title && $this->releaseDate;
        // return true;
    }

    public function getImage(): string
    {
        if ($this->image) {
            return $this->image;
        }

        return 'https://image.tmdb.org/t/p/w500/8Gxv8gSFCU0XGDykEGv7zR1n2ua.jpg';
    }

    public function isRelease(): bool
    {
        return $this->releaseDate;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if (!$this->isValid()) return '';

        $this->title = strtoupper($this->title);
        return view('components.movie.card');
    }
}
