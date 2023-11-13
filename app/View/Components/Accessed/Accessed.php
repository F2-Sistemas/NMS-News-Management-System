<?php

namespace App\View\Components\Accessed;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\News\News;

class Accessed extends Component
{
    /**
     * Create a new component instance.
     */
    public $accessedNews;
    //  public function newsMostAccessed(News $news)
    //  {
    //      $accesseds = News::orderBy('created_at')->where('featured',  true)->limit(4)->get();
    //      return view('news.home', compact('accesseds'));
    //  }
    public function __construct(?int $accessedNews = null)
    {
        $this->accessedNews = News::orderBy('created_at', 'desc')->where('featured', false)->limit(5)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.accessed.accessed');
    }
}
