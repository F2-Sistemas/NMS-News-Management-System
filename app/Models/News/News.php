<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Spatie\Tags\HasTags;

class News extends Model
{
    use HasFactory;
    use HasTags;

    protected $fillable = [
        'title',
        'slug',
        'cover',
        'subtitle',
        'published',
        'content',
        'visit',
    ];

    protected $casts = [
        'published' => 'boolean',
    ];

    public static function getLocale(): string
    {
        return Config::get('app.locale', 'en');
    }
}
