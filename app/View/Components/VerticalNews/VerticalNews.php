<?php

namespace App\View\Components\VerticalNews;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\News\News;

class VerticalNews extends Component
{
    public ?\Illuminate\Pagination\LengthAwarePaginator $latestNews;

    /**
     * Create a new component instance.
     */
    public function __construct(
        ?int $perPage = null,
        ?string $tag = null,
    ) {
        $perPage ??= request()->get('perPage', 5);
        $tag ??= request()->get('tag');
        $tag = is_string($tag) && trim($tag) ? trim($tag) : null;

        $perPage = is_numeric($perPage) && $perPage > 1 && $perPage <= 20 ? intval($perPage) : 5;
        $lang = config('app.locale');

        $query = News::orderBy('id', 'DESC')
            ->with([
                'tags' => function ($query) use ($tag, $lang) {
                    $query->select('name', 'slug')->limit(4);
                },
            ])
            ->whereHas('tags', function ($subQuery) use ($tag, $lang) {
                $subQuery
                    ->when(
                        $tag,
                        fn ($subQuery2) => $subQuery2->where('slug->' . ($lang ?: 'en'), $tag)
                    );
            });

        $this->latestNews = $query->paginate($perPage);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.vertical-news.vertical-news');
    }
}
