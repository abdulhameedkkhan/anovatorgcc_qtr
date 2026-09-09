@extends('layouts.app')

@section('title', $product['name'].' · Anovator GCC')
@section('description', $product['summary'])

@section('content')
@php
    $stagePhotos = [
        'a5' => 'tile-clinic.jpg',
        'm3' => 'tile-lab.jpg',
        'm1' => 'hero-2.jpg',
        'm0' => 'hero-3.jpg',
    ];
    $stage = $stagePhotos[$product['slug']] ?? 'tile-clinic.jpg';
@endphp
<section class="page-hero">
    <p class="breadcrumb"><a href="{{ route('home') }}">Home</a> / <a href="{{ route('products.index') }}">Products</a> / {{ $product['name'] }}</p>
    <p class="kicker">{{ $product['tag'] }}</p>
    <h1>{{ $product['name'] }}</h1>
    <p>{{ $product['headline'] }}</p>
</section>

<section class="page-wrap">
    <div class="product-detail">
        <div class="page-figure has-photo" style="background-image:url('{{ asset('images/photos/'.$stage) }}')">
            @include('partials.device', ['model' => $product['slug']])
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
