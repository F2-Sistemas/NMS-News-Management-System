<?php

namespace Database\Factories\News;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => ucfirst(fake()->words(10, true)),
            'slug' => fn (array $attr) => str($attr['title'])->slug(),
            'cover' => function () {
                $storagePath = Storage::disk('public')?->path('demo-cover.jpg');
                $demoDataPath = database_path('demo-data/images/demo-cover.jpg');

                if (!is_file($demoDataPath)) {
                    return is_file($storagePath) ? 'demo-cover.jpg' : null;
                }

                if (!is_file($storagePath)) {
                    copy($demoDataPath, $storagePath);
                }

                return is_file($storagePath) ? 'demo-cover.jpg' : null;
            },
            'subtitle' => fake()->words(15, true),
            'featured' => fake()->boolean(10),
            'published' => fake()->boolean(80),
            'content' => fake()->realText(800),
        ];
    }
}
