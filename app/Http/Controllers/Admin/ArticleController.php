<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(): View
    {
        return view('admin.articles.index', [
            'articles' => Article::query()->orderBy('sort_order')->orderByDesc('published_at')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.articles.form', [
            'article' => new Article([
                'author' => 'Anovator Team',
                'sort_order' => (Article::query()->max('sort_order') ?? 0) + 1,
                'published_at' => now()->toDateString(),
                'date_label' => now()->format('j F Y'),
            ]),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $article = Article::query()->create($this->validated($request));

        return redirect()
            ->route('admin.articles.edit', $article)
            ->with('success', 'Article created.');
    }

    public function edit(Article $article): View
    {
        return view('admin.articles.form', compact('article'));
    }

    public function update(Request $request, Article $article): RedirectResponse
    {
        $article->update($this->validated($request, $article));

        return redirect()
            ->route('admin.articles.edit', $article)
            ->with('success', 'Article updated.');
    }

    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Article deleted.');
    }

    private function validated(Request $request, ?Article $article = null): array
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255'],
            'excerpt' => ['required', 'string', 'max:1000'],
            'date_label' => ['required', 'string', 'max:100'],
            'author' => ['nullable', 'string', 'max:255'],
            'body' => ['required', 'string'],
            'published_at' => ['nullable', 'date'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'image' => ['nullable', 'image', 'max:4096'],
            'image_path' => ['nullable', 'string', 'max:255'],
        ]);

        $slug = Str::slug($data['slug'] ?: $data['title']);
        $unique = Article::query()
            ->where('slug', $slug)
            ->when($article, fn ($q) => $q->where('id', '!=', $article->id))
            ->exists();

        if ($unique) {
            $slug .= '-'.Str::lower(Str::random(4));
        }

        $imagePath = $data['image_path'] ?? $article?->image ?? '';

        if ($request->hasFile('image')) {
            $dir = public_path('images/blog');
            File::ensureDirectoryExists($dir);
            $ext = $request->file('image')->getClientOriginalExtension() ?: 'jpg';
            $filename = $slug.'.'.$ext;
            $request->file('image')->move($dir, $filename);
            $imagePath = 'blog/'.$filename;
        }

        if ($imagePath === '') {
            $imagePath = 'photos/news-1.jpg';
        }

        return [
            'title' => $data['title'],
            'slug' => $slug,
            'excerpt' => $data['excerpt'],
            'date_label' => $data['date_label'],
            'author' => $data['author'] ?? null,
            'body' => $data['body'],
            'published_at' => $data['published_at'] ?? null,
            'sort_order' => $data['sort_order'] ?? 0,
            'image' => $imagePath,
        ];
    }
}
