<?php

namespace App\View\Components\Accessed;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\News\News;

class AccessedItem extends Component
{
    public string $classSuffix = '';

    /**
     * Create a new component instance.
     */
    public function __construct(public News $accessed, string $classSuffix = '')
    {
        $this->classSuffix = $classSuffix;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.accessed.accessed-item');
    }
}
