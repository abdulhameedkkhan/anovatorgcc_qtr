@extends('layouts.app')

@section('title', 'About Us — Anovator | Exclusive Gulf Distributor')
@section('description', 'Official Anovator partner for the Gulf & Middle East. Advanced body composition assessment systems with regional support across the GCC.')

@section('content')
<section class="page-hero has-photo" style="background-image:url('{{ asset('images/photos/hero-3.jpg') }}')">
    <p class="breadcrumb"><a href="{{ route('home') }}">Home</a> / About Us</p>
    <p class="kicker">About Us</p>
    <h1>About Anovator</h1>
    <p>Official Anovator Partner for the Gulf &amp; Middle East. Advanced Technology. Efficient Operation. Value Beyond Traditional Measurement.</p>
</section>

<section class="page-wrap prose">
    <div class="split-2">
        <div>
            <h2>Body Composition Analysis</h2>
            <p>Anovator is a global developer and manufacturer of advanced body composition assessment systems, built on scientific innovation and engineered for professional environments.</p>
            <p>Since 2013, Anovator has helped advance the field by integrating artificial intelligence, high-precision 3D optical scanning, and intelligent data management, turning complex measurements into clear, structured insights.</p>
            <p>We bring the world’s most advanced body composition analyzer to fitness, health, and wellness facilities across the Arabian Gulf — now fully available in Arabic for the Gulf market.</p>
        </div>
        <div class="page-figure product-stage">
            <img src="{{ asset('images/products/a5/1.png') }}?v=7" alt="Anovator A5" loading="lazy">
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
    <p>All within one unified experience that supports a deeper understanding of body composition and key physical indicators.</p>

    <h2 id="values">Built to Medical-Grade Standards</h2>
    <p>Anovator systems are developed within an integrated research, development, and manufacturing environment that follows internationally recognized medical and technical standards.</p>
    <ul class="plus-list">
        <li>Trusted Accuracy — precise measurements for results you can rely on</li>
        <li>Multi-Function System — advanced functions within one system</li>
        <li>Professional Use — designed to support efficient daily operations</li>
        <li>Quality Control — monitoring and testing throughout manufacturing</li>
        <li>Regional Support — ongoing technical support across the GCC</li>
    </ul>

    <h2>Designed for Professional Environments</h2>
    <p>Anovator systems are built for professional settings that require efficient operation, ease of use, and reliable assessment workflows. This makes Anovator suitable for healthcare facilities, nutrition clinics, rehabilitation centers, sports performance environments, and wellness centers.</p>

    <h2>Regional Representation &amp; Operational Support Across the Gulf</h2>
    <p>Anovator GCC is the authorized regional partner across Qatar, the UAE, Saudi Arabia, Bahrain, Kuwait, and Oman — providing supply, installation, professional training, 24/7 technical support, 3-year device warranty, and lifetime warranty on software and updates.</p>
    <p>This helps facilities adopt Anovator technology with confidence and operate it with greater efficiency.</p>

    <h2>Value Beyond Measurement</h2>
    <p>The value of Anovator systems goes beyond measurement accuracy. They become an operational and commercial asset within the facility — improving service quality, supporting follow-up plans, delivering a more advanced user experience, and enabling sustainable growth.</p>

    <div class="stat-grid">
        @foreach($stats as $stat)
            <div class="stat-item">
                <strong>{{ $stat['value'] }}</strong>
                <span>{{ $stat['label'] }}</span>
            </div>
        @endforeach
    </div>

    <div class="cta-row">
        <a class="btn-solid" href="{{ route('contact') }}">Choose the Right Solution for Your Facility</a>
        <a class="link-arrow" href="{{ route('solutions') }}">Sectors We Serve</a>
    </div>
</section>
@endsection
