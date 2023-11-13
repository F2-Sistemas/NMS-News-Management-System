<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            'Video',
            'Image',
            'Book',
            'Bootcamp',
            'Aula',
            'EBook',
            'GameHouse',
            'News',
            'Blogs',
            'Formaturas',
            'Anime',
            'Programing',
        ];

        \App\Models\News\News::factory(50)
            ->create()
            ->each(
                fn ($news) => $news->attachTags([
                    Arr::random($tags),
                    Arr::random($tags),
                    'Via seeder',
                ])
            );
    }
}
