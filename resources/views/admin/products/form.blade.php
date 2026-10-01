@extends('admin.layout')

@section('title', $product->exists ? 'Edit Product' : 'Add Product')
@section('heading', $product->exists ? 'Edit Product' : 'Add Product')
@section('subheading', $product->exists ? $product->name : 'Create a new product for the website')

@section('content')
@php
    $featuresText = old('features_text', collect($product->features ?? [])->implode("\n"));
    $specsText = old('specs_text', collect($product->specs ?? [])->map(fn ($v, $k) => $k.': '.$v)->implode("\n"));
@endphp
<div class="admin-panel">
    <form class="admin-form" method="post" action="{{ $product->exists ? route('admin.products.update', $product) : route('admin.products.store') }}">
        @csrf
        @if($product->exists)
            @method('PUT')
        @endif

        <div class="admin-form-grid">
            <div class="admin-field">
                <label>Name *</label>
                <input type="text" name="name" value="{{ old('name', $product->name) }}" required>
            </div>
            <div class="admin-field">
                <label>Code *</label>
                <input type="text" name="code" value="{{ old('code', $product->code) }}" required>
            </div>
            <div class="admin-field">
                <label>Slug</label>
                <input type="text" name="slug" value="{{ old('slug', $product->slug) }}" placeholder="auto from name">
            </div>
            <div class="admin-field">
                <label>Sort order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $product->sort_order ?? 0) }}" min="0">
            </div>
            <div class="admin-field">
                <label>Tag *</label>
                <input type="text" name="tag" value="{{ old('tag', $product->tag) }}" required>
            </div>
            <div class="admin-field">
                <label>Ideal use *</label>
                <input type="text" name="ideal" value="{{ old('ideal', $product->ideal) }}" required>
            </div>
        </div>

        <div class="admin-field">
            <label>Headline *</label>
            <input type="text" name="headline" value="{{ old('headline', $product->headline) }}" required>
        </div>
        <div class="admin-field">
            <label>Summary *</label>
            <textarea name="summary" required>{{ old('summary', $product->summary) }}</textarea>
        </div>

        <div class="admin-form-grid">
            <div class="admin-field">
                <label>Display *</label>
                <input type="text" name="display" value="{{ old('display', $product->display) }}" required>
            </div>
            <div class="admin-field">
                <label>Method *</label>
                <input type="text" name="method" value="{{ old('method', $product->method) }}" required>
            </div>
            <div class="admin-field">
                <label>Frequencies *</label>
                <input type="text" name="frequencies" value="{{ old('frequencies', $product->frequencies) }}" required>
            </div>
            <div class="admin-field">
                <label>Weight *</label>
                <input type="text" name="weight" value="{{ old('weight', $product->weight) }}" required>
            </div>
            <div class="admin-field">
                <label>Range *</label>
                <input type="text" name="range" value="{{ old('range', $product->range) }}" required>
            </div>
            <div class="admin-field">
                <label>Extra *</label>
                <input type="text" name="extra" value="{{ old('extra', $product->extra) }}" required>
            </div>
        </div>

        <div class="admin-field">
            <label>Features (one per line)</label>
            <textarea name="features_text">{{ $featuresText }}</textarea>
        </div>
        <div class="admin-field">
            <label>Specs (Label: Value, one per line)</label>
            <textarea name="specs_text" style="min-height:180px">{{ $specsText }}</textarea>
            <div class="hint">Example: Display: 32" IPS HD touch</div>
        </div>

        <div class="admin-actions">
            <button class="btn" type="submit">Save product</button>
            <a class="btn btn-secondary" href="{{ route('admin.products.index') }}">Cancel</a>
            @if($product->exists)
                <a class="btn btn-secondary" href="{{ route('products.show', $product->slug) }}" target="_blank" rel="noopener">View on site</a>
            @endif
        </div>
    </form>
</div>
@endsection
