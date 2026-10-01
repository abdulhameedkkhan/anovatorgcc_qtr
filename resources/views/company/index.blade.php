@extends('layouts.app')

@section('title', 'Company · Anovator GCC')
@section('description', 'Anovator GCC is the authorized regional partner for advanced body composition assessment systems across the Gulf.')

@section('content')
<section class="page-hero has-photo" style="background-image:url('{{ asset('images/photos/hero-3.jpg') }}')">
    <p class="breadcrumb"><a href="{{ route('home') }}">Home</a> / Company</p>
    <p class="kicker">Company</p>
    <h1>Reinventing the Future of Healthcare</h1>
    <p>Suitable for all ages, from 3 to 99 years. Trusted accuracy. Multi-function systems for professional use across the GCC.</p>
</section>

<section class="page-wrap prose">
    <div class="split-2">
        <div>
            <h2>About Anovator</h2>
            <p>Anovator is a global developer and manufacturer of advanced body composition assessment systems, built on scientific innovation and engineered for professional environments.</p>
            <p>With 13+ years of experience and presence in 50+ countries, Anovator integrates artificial intelligence, high-precision 3D optical scanning, and intelligent data management — turning complex measurements into clear, structured insights.</p>
        </div>
        <div class="page-figure product-stage">
            <img src="{{ asset('images/products/a5/1.png') }}?v=4" alt="Anovator A5" loading="lazy">
        </div>
    </div>

    <h2>From Measurement to an Integrated Platform</h2>
    <p>Anovator systems are not designed as conventional measurement devices, but as integrated assessment platforms that bring together:</p>
    <ul class="plus-list">
        <li>8-electrode BIA body composition analysis</li>
        <li>3D visual body scanning with millimeter-level precision</li>
        <li>Posture and balance assessment</li>
        <li>Selected basic vital-sign assessment</li>
        <li>Digital data, reporting, and free mobile follow-up</li>
    </ul>

    <h2 id="values">Certified &amp; Safe Technology</h2>
    <p>International certifications. Clinically trusted accuracy. Local R&amp;D. Global reach. Systems are developed within an integrated research, development, and manufacturing environment.</p>
    <ul class="plus-list">
        <li>Trusted Accuracy — precise measurements for results you can rely on</li>
        <li>Multi-Function System — advanced functions within one system</li>
        <li>Professional Use — designed to support efficient daily operations</li>
        <li>Quality Control — monitoring and testing throughout manufacturing</li>
        <li>Regional Support — ongoing technical support across the GCC</li>
    </ul>

    <h2>Anovator GCC</h2>
    <p>Anovator GCC is the authorized regional partner across Qatar, the UAE, Saudi Arabia, Bahrain, Kuwait, and Oman — providing supply, installation, professional training, 24/7 technical support, 3-year device warranty, and lifetime warranty on software and updates.</p>

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
