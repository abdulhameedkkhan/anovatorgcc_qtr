@extends('layouts.app')

@section('title', $product['name'].' · Anovator GCC')
@section('description', $product['summary'])

@section('content')
@php
    $stagePhotos = [];
    foreach (['a5', 'm3', 'm1', 'm0', 'p5', 'm2-pro'] as $slug) {
        $stagePhotos[$slug] = file_exists(public_path('images/products/'.$slug.'/1.jpg'))
            ? 'products/'.$slug.'/1.jpg'
            : 'products/'.$slug.'/1.png';
    }
    $stage = $stagePhotos[$product['slug']] ?? 'products/a5/1.png';
@endphp
<section class="page-hero has-photo" style="background-image:url('{{ asset('images/photos/hero-bg.jpg') }}')">
    <p class="breadcrumb"><a href="{{ route('home') }}">Home</a> / <a href="{{ route('products.index') }}">Products</a> / {{ $product['name'] }}</p>
    <p class="kicker">{{ $product['tag'] }}</p>
    <h1>{{ $product['name'] }}</h1>
    <p>{{ $product['headline'] }}</p>
</section>

<section class="page-wrap">
    <div class="product-detail">
        <div class="page-figure product-stage">
            <img src="{{ asset('images/'.$stage) }}?v=10" alt="{{ $product['name'] }}" loading="lazy" decoding="async">
        </div>
        <div class="prose">
            <p>{{ $product['summary'] }}</p>
            <ul class="plus-list">
                @foreach($product['features'] as $feature)
                    <li>{{ $feature }}</li>
                @endforeach
            </ul>
            <table class="spec-table">
                @foreach($product['specs'] as $label => $value)
                    <tr>
                        <th>{{ $label }}</th>
                        <td>{{ $value }}</td>
                    </tr>
                @endforeach
            </table>
            <div class="cta-row">
                <a class="btn-solid" href="{{ route('contact') }}">Request a demo</a>
                <a class="link-arrow" href="{{ route('finder') }}">Compare models</a>
            </div>
        </div>
    </div>

    <h2 class="section-title" style="margin-top:64px">Further systems</h2>
    <div class="awards-track">
        @foreach($products as $item)
            @if($item['slug'] !== $product['slug'])
                <a class="award-card" href="{{ route('products.show', $item['slug']) }}">
                    <div class="award-visual">
                        @include('partials.device', ['model' => $item['slug']])
                    </div>
                    <h3>{{ $item['name'] }}</h3>
                    <p>{{ $item['headline'] }}</p>
                </a>
            @endif
        @endforeach
    </div>
</section>
@endsection
