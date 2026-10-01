<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $path = storage_path('app/blog-scrape/articles.json');

        if (! File::exists($path)) {
            $this->command?->error('Missing scraped articles JSON at '.$path);

            return;
        }

        $articles = json_decode(File::get($path), true, 512, JSON_THROW_ON_ERROR);

        // Newest first for display order
        usort($articles, function (array $a, array $b) {
            return strcmp($b['published_at'] ?? '', $a['published_at'] ?? '');
        });

        foreach ($articles as $index => $article) {
            Article::query()->updateOrCreate(
                ['slug' => $article['slug']],
                [
                    'title' => $article['title'],
                    'excerpt' => $article['excerpt'],
                    'date_label' => $article['date'],
                    'author' => $article['author'] ?? null,
                    'image' => $article['image'],
                    'body' => $article['body'],
                    'published_at' => $article['published_at'] ?? null,
                    'sort_order' => $index + 1,
                ]
            );
        }
    }
}
