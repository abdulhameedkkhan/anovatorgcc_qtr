<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'excerpt',
        'date_label',
        'author',
        'image',
        'body',
        'published_at',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'date',
        ];
    }

    public function toCatalogArray(): array
    {
        return [
            'slug' => $this->slug,
            'title' => $this->title,
            'excerpt' => $this->excerpt,
            'date' => $this->date_label,
            'author' => $this->author,
            'image' => $this->image,
            'body' => $this->body,
            'published_at' => optional($this->published_at)?->toDateString(),
        ];
    }
}
