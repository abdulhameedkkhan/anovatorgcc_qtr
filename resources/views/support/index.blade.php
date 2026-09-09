@extends('layouts.app')

@section('title', 'Support · Anovator GCC')
@section('description', 'Technical service, installation, training, and warranty support for Anovator systems across the GCC.')

@section('content')
<section class="page-hero">
    <p class="breadcrumb"><a href="{{ route('home') }}">Home</a> / Support</p>
    <p class="kicker">Support</p>
    <h1>Advanced Solutions. Integrated Services.</h1>
    <p>Practical training, 24/7 technical assistance across the GCC, and warranty coverage designed for professional daily operation.</p>
</section>

<section class="page-wrap prose">
    <div class="industry-grid">
        <article class="industry-card">
            <h2>Posture & Balance Assessment</h2>
            <p>Advanced technology evaluates posture, alignment, and body balance through a fast, non-invasive assessment.</p>
        </article>
        <article class="industry-card">
            <h2>Smart Analysis</h2>
            <p>AI-supported technology enables precise measurement and analysis of body composition and selected health indicators.</p>
        </article>
        <article class="industry-card" id="training">
            <h2>Technical Support & Training</h2>
            <p>Practical training on system use and operation, supported by 24/7 technical assistance across the GCC. Installation takes half a working day, with full team training completed the same day.</p>
        </article>
        <article class="industry-card" id="warranty">
            <h2>Warranty & After-Sales Services</h2>
            <p>3-year warranty on the device and spare parts, with a lifetime warranty on software and updates.</p>
        </article>
        <article class="industry-card">
            <h2>Data & Digital Reporting</h2>
            <p>Easy, secure access to measurements, results, and digital reports through the free Anovator app.</p>
        </article>
        <article class="industry-card">
            <h2>Customer Records & Follow-Up</h2>
            <p>Stored customer records and data support follow-up, re-engagement, and long-term customer retention.</p>
        </article>
    </div>

    <h2>Certified & Safe Technology</h2>
    <p>International certifications. Clinically trusted accuracy. Local R&amp;D. Global reach.</p>
    <ul class="plus-list">
        <li>Medical Device CTI Class II</li>
        <li>ISO 13485</li>
        <li>RoHS</li>
        <li>FDA</li>
        <li>CE</li>
    </ul>

    <div class="cta-row">
        <a class="link-arrow" href="{{ route('faq') }}">View all FAQs</a>
        <a class="link-arrow" href="{{ route('contact') }}">Contact support</a>
    </div>
</section>
@endsection
