@extends('layouts.app')

@section('title', 'Business Solutions — Anovator | B2B Gulf')
@section('description', 'Tailored Anovator solutions for businesses, institutions, and government entities across the GCC — from ROI and procurement to implementation and after-sales support.')

@section('content')
<section class="page-hero has-photo" style="background-image:url('{{ asset('images/photos/mega-products.jpg') }}')">
    <p class="breadcrumb"><a href="{{ route('home') }}">Home</a> / Tailored Business Solutions</p>
    <p class="kicker">Business Solutions</p>
    <h1>Tailored Solutions for Businesses, Institutions and Government Entities</h1>
    <p>Structured solutions for the private sector, institutional clients, and public-sector projects across the GCC.</p>
</section>

<section class="page-wrap prose">
    <p>From needs assessment and ROI calculation to procurement support, implementation, and ensuring operational continuity, Anovator GCC helps organizations adopt the right solution based on facility type, service scope, and operational requirements.</p>
    <p>Our role goes beyond supply alone. We help align each solution with technical specifications and service requirements, define the most suitable model and unit quantity, and build a clear implementation path from procurement to operation — strengthening institutional readiness and long-term operational value.</p>

    <h2>One Regional Model. Multiple Operational Needs. An Integrated Support Ecosystem.</h2>
    <div class="industry-grid">
        <article class="industry-card">
            <h2>Brand &amp; Experience Options</h2>
            <p>Custom options that help align the device with your facility’s brand identity and client experience, enhancing visual consistency and elevating the professionalism of the service.</p>
        </article>
        <article class="industry-card">
            <h2>Investment Confidence</h2>
            <p>Support that helps facilities make investment decisions with greater confidence and increase the commercial value of the service through payment options, financing solutions, and indicative ROI analysis upon request.</p>
        </article>
        <article class="industry-card">
            <h2>Institutional &amp; Government Ready</h2>
            <p>A structured framework designed to help institutional and government entities move from solution review to procurement and implementation readiness with greater clarity.</p>
        </article>
        <article class="industry-card">
            <h2>GCC Implementation Model</h2>
            <p>A GCC-specific implementation model designed to support long-term continuity and operational readiness, from initial installation through after-sales support.</p>
        </article>
    </div>

    <h2 style="margin-top:48px">Indicative Return and Payback Metrics</h2>
    <p>An initial view of the service’s impact on return, payback period, and break-even. The following indicators illustrate how clearer reporting, stronger service value, and improved follow-up can support growth, strengthen customer retention, and increase return on investment.</p>
    <div class="stat-grid">
        <div class="stat-item"><strong>15%–25%</strong><span>Increase in new customer conversion</span></div>
        <div class="stat-item"><strong>20%–35%</strong><span>Increase in customer retention rate</span></div>
        <div class="stat-item"><strong>15%–30%</strong><span>Increase in memberships &amp; upsell</span></div>
        <div class="stat-item"><strong>10%–18%</strong><span>Reduction in operational waste</span></div>
        <div class="stat-item"><strong>18%–35%</strong><span>Increase in session-related revenue</span></div>
        <div class="stat-item"><strong>2–3</strong><span>Months payback for some facilities</span></div>
    </div>
    <p class="form-note">Indicative figures. Actual results may vary depending on business type, pricing, session volume, and operating model.</p>

    <h2>From Solution Selection to Operational Readiness</h2>
    <p>Share your facility type, project scope, and procurement requirements, and we will help identify the most suitable model and the most appropriate implementation approach.</p>

    <div class="cta-row">
        <a class="btn-solid" href="{{ route('contact') }}">Discover the Right Solution for Your Facility</a>
        <a class="link-arrow" href="{{ route('products.index') }}">View Products</a>
    </div>
</section>
@endsection
