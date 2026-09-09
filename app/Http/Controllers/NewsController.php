<?php

namespace App\Http\Controllers;

use App\Support\Catalog;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        return view('news.index', [
            'articles' => Catalog::news(),
        ]);
    }

    public function show(string $slug): View
    {
        $article = Catalog::article($slug);

        if (! $article) {
            abort(404);
        }

        return view('news.show', [
            'article' => $article,
            'articles' => Catalog::news(),
        ]);
    }
}
