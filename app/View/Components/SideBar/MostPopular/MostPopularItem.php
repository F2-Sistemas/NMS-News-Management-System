<?php

namespace App\View\Components\SideBar\MostPopular;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MostPopularItem extends Component
{
    public $description;
    public $date;

    /**
     * Create a new component instance.
     */
    public function __construct(string $description, string $date)
    {
        $this->description = $description;
        $this->date = $date;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.side-bar.most-popular.most-popular-item');
    }
}
