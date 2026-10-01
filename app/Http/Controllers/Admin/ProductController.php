<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        return view('admin.products.index', [
            'products' => Product::query()->orderBy('sort_order')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.products.form', [
            'product' => new Product([
                'sort_order' => (Product::query()->max('sort_order') ?? 0) + 1,
                'features' => [],
                'specs' => [],
            ]),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $product = Product::query()->create($this->validated($request));

        return redirect()
            ->route('admin.products.edit', $product)
            ->with('success', 'Product created.');
    }

    public function edit(Product $product): View
    {
        return view('admin.products.form', compact('product'));
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $product->update($this->validated($request, $product));

        return redirect()
            ->route('admin.products.edit', $product)
            ->with('success', 'Product updated.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product deleted.');
    }

    private function validated(Request $request, ?Product $product = null): array
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'max:50'],
            'slug' => ['nullable', 'string', 'max:255'],
            'tag' => ['required', 'string', 'max:255'],
            'headline' => ['required', 'string', 'max:500'],
            'summary' => ['required', 'string'],
            'ideal' => ['required', 'string', 'max:255'],
            'display' => ['required', 'string', 'max:255'],
            'method' => ['required', 'string', 'max:255'],
            'frequencies' => ['required', 'string', 'max:255'],
            'weight' => ['required', 'string', 'max:100'],
            'range' => ['required', 'string', 'max:100'],
            'extra' => ['required', 'string', 'max:500'],
            'features_text' => ['nullable', 'string'],
            'specs_text' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $slug = Str::slug($data['slug'] ?: $data['name']);
        $unique = Product::query()
            ->where('slug', $slug)
            ->when($product, fn ($q) => $q->where('id', '!=', $product->id))
            ->exists();

        if ($unique) {
            $slug .= '-'.Str::lower(Str::random(4));
        }

        $features = collect(preg_split("/\r\n|\n|\r/", (string) ($data['features_text'] ?? '')))
            ->map(fn ($line) => trim($line))
            ->filter()
            ->values()
            ->all();

        $specs = [];
        foreach (preg_split("/\r\n|\n|\r/", (string) ($data['specs_text'] ?? '')) as $line) {
            $line = trim($line);
            if ($line === '' || ! str_contains($line, ':')) {
                continue;
            }
            [$label, $value] = array_map('trim', explode(':', $line, 2));
            if ($label !== '') {
                $specs[$label] = $value;
            }
        }

        return [
            'name' => $data['name'],
            'code' => $data['code'],
            'slug' => $slug,
            'tag' => $data['tag'],
            'headline' => $data['headline'],
            'summary' => $data['summary'],
            'ideal' => $data['ideal'],
            'display' => $data['display'],
            'method' => $data['method'],
            'frequencies' => $data['frequencies'],
            'weight' => $data['weight'],
            'range' => $data['range'],
            'extra' => $data['extra'],
            'features' => $features,
            'specs' => $specs,
            'sort_order' => $data['sort_order'] ?? 0,
        ];
    }
}
