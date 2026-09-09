<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use App\Support\Catalog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        if ($request->filled('website')) {
            return back();
        }

        $data = $request->validate([
            'title' => ['nullable', 'string', 'max:20'],
            'first_name' => ['required', 'string', 'max:80'],
            'last_name' => ['required', 'string', 'max:80'],
            'city' => ['nullable', 'string', 'max:80'],
            'country' => ['required', 'string', 'max:80'],
            'email' => ['required', 'email', 'max:180', 'unique:newsletter_subscribers,email'],
        ]);

        NewsletterSubscriber::query()->create($data);

        return back()->with('newsletter', 'Thank you. You are now subscribed to Anovator updates.');
    }

    public static function countries(): array
    {
        return Catalog::countries();
    }
}
