@extends('layouts.app')

@section('title', 'Products · Anovator GCC')
@section('description', 'Explore Anovator A5, M3, M1, M0, P5, and M2 Pro body composition analysis systems for professional assessment.')

@section('content')
<section class="page-hero has-photo" style="background-image:url('{{ asset('images/photos/hero-2.jpg') }}')">
    <p class="breadcrumb"><a href="{{ route('home') }}">Home</a> / Products</p>
    <p class="kicker">Products</p>
    <h1>Smart Body Composition Analysis Systems</h1>
    <p>Advanced assessment technology for professional use. Multi-category systems designed to support professional assessment, digital reporting, and smoother user experiences across different service environments.</p>
</section>

<section class="page-wrap" id="bia">
    <div class="product-grid">
        @foreach($products as $product)
            <a class="product-card" href="{{ route('products.show', $product['slug']) }}">
                <div class="product-visual">
                    @include('partials.device', ['model' => $product['slug']])
                </div>
                <p class="chip">{{ $product['tag'] }}</p>
                <h2>{{ $product['name'] }}</h2>
                <p>{{ $product['headline'] }}</p>
                <span class="link-arrow">Discover {{ $product['code'] }}</span>
            </a>
        @endforeach
    </div>

    <h2 class="section-title" style="margin-top:64px">Compare the models</h2>
    <p style="margin-bottom:20px;color:#5b6168">Every model shares the same 8-point BIA measurement precision. The difference is in size, additional measurements, and the environment each is built for.</p>
    <div class="table-wrap">
        <table class="spec-table">
            <tr>
                <th></th>
                @foreach($products as $product)
                    <td><strong>{{ $product['name'] }}</strong><br><span style="color:#5b6168">{{ $product['tag'] }}</span></td>
                @endforeach
            </tr>
            <tr>
                <th>Display</th>
                @foreach($products as $product)<td>{{ $product['display'] }}</td>@endforeach
            </tr>
            <tr>
                <th>Measurement method</th>
                @foreach($products as $product)<td>{{ $product['method'] }}</td>@endforeach
            </tr>
            <tr>
                <th>Frequencies</th>
                @foreach($products as $product)<td>{{ $product['frequencies'] }}</td>@endforeach
            </tr>
            <tr>
                <th>Weight</th>
                @foreach($products as $product)<td>{{ $product['weight'] }}</td>@endforeach
            </tr>
            <tr>
                <th>Measuring range</th>
                @foreach($products as $product)<td>{{ $product['range'] }}</td>@endforeach
            </tr>
            <tr>
                <th>Additional measurements</th>
                @foreach($products as $product)<td>{{ $product['extra'] }}</td>@endforeach
            </tr>
            <tr>
                <th>Ideal use</th>
                @foreach($products as $product)<td>{{ $product['ideal'] }}</td>@endforeach
            </tr>
        </table>
    </div>

    <div class="cta-row">
        <a class="link-arrow" href="{{ route('finder') }}">Open the product finder</a>
        <a class="link-arrow" href="{{ route('contact') }}">Request a demo</a>
    </div>
</section>
@endsection
