<?php

namespace App\Http\Controllers;

use App\Support\Catalog;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        return view('products.index', [
            'products' => Catalog::products(),
        ]);
    }

    public function show(string $slug): View|RedirectResponse
    {
        $product = Catalog::product($slug);

        if (! $product) {
            abort(404);
        }

        return view('products.show', [
            'product' => $product,
            'products' => Catalog::products(),
        ]);
    }
}
