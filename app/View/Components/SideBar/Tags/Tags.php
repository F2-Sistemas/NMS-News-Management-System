<?php

namespace App\View\Components\SideBar\Tags;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Spatie\Tags\Tag;

class Tags extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.side-bar.tags.tags', [
            'latestTags' => $this->getLatestTags(),
        ]);
    }

    public function getLatestTags(): \Illuminate\Database\Eloquent\Collection
    {
        return cache()->remember(
            __METHOD__,
            (20 * 60),
            fn () => Tag::select('name', 'slug')->limit(12)->get()
        );
    }
}
