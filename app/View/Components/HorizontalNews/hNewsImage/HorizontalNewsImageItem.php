<?php

namespace App\View\Components\HorizontalNews\hNewsImage;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HorizontalNewsImageItem extends Component
{
    public $title;
    public $date;

    /**
     * Create a new component instance.
     */
    public function __construct(string $title, string $date)
    {
        $this->title = $title;
        $this->date = $date;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.horizontal-news.h-news-image.horizontal-news-image-item');
    }
}
