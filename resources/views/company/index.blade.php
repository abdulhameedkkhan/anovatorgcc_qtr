@extends('layouts.app')

@section('title', 'Company · Anovator GCC')
@section('description', 'Anovator GCC is the authorized regional partner for advanced body composition assessment systems across the Gulf.')

@section('content')
<section class="page-hero">
    <p class="breadcrumb"><a href="{{ route('home') }}">Home</a> / Company</p>
    <p class="kicker">Company</p>
    <h1>Body Composition Analysis</h1>
    <p>Advanced Technology. Efficient Operation. Value Beyond Traditional Measurement.</p>
</section>

<section class="page-wrap prose">
    <div class="split-2">
        <div>
            <h2>About Anovator</h2>
            <p>Anovator is a global developer and manufacturer of advanced body composition assessment systems, built on scientific innovation and engineered for professional environments.</p>
            <p>Since 2013, Anovator has helped advance the field by integrating artificial intelligence, high-precision 3D optical scanning, and intelligent data management, turning complex measurements into clear, structured insights.</p>
        </div>
        <div class="page-figure has-photo" style="background-image:url('{{ asset('images/photos/hero-3.jpg') }}')">
            @include('partials.device', ['model' => 'a5'])
        </div>
    </div>

    <h2>From Measurement to an Integrated Platform</h2>
    <p>Anovator systems are not designed as conventional measurement devices, but as integrated assessment platforms that bring together:</p>
    <ul class="plus-list">
        <li>Body composition analysis</li>
        <li>Digital data and reporting management</li>
        <li>Selected basic vital-sign assessment</li>
        <li>Posture and alignment assessment</li>
        <li>AI-powered 3D visual scanning</li>
    </ul>

    <h2 id="values">Built to Medical-Grade Standards</h2>
    <p>Anovator systems are developed within an integrated research, development, and manufacturing environment that follows internationally recognized medical and technical standards.</p>
    <ul class="plus-list">
        <li>Product safety and quality</li>
        <li>Measurement accuracy and result consistency</li>
        <li>Data reliability</li>
        <li>Stable performance across different operating environments</li>
    </ul>

    <h2>Anovator GCC</h2>
    <p>Anovator GCC is the authorized regional partner across the Gulf, providing a complete framework for implementation, operation, and long-term support. This includes supply, installation, professional training, ongoing technical support, and warranty coverage for the device, software, and updates.</p>

    <div class="stat-grid">
        @foreach($stats as $stat)
            <div class="stat-item">
                <strong>{{ $stat['value'] }}</strong>
                <span>{{ $stat['label'] }}</span>
            </div>
        @endforeach
    </div>

    <div class="cta-row">
        <a class="link-arrow" href="{{ route('contact') }}">Contact Anovator GCC</a>
        <a class="link-arrow" href="{{ route('industries') }}">Industries we serve</a>
    </div>
</section>
@endsection
