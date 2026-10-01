@extends('layouts.app')

@section('title', 'Terms · Anovator GCC')

@section('content')
<section class="page-hero has-photo" style="background-image:url('{{ asset('images/photos/hero-bg.jpg') }}')">
    <p class="breadcrumb"><a href="{{ route('home') }}">Home</a> / Terms</p>
    <h1>Use conditions</h1>
</section>
<section class="page-wrap prose">
    <p>This website presents Anovator assessment systems for professional and home-use environments. Product availability, configuration, and documentation may vary by country and facility type.</p>
    <p>Indicative business figures shown on marketing pages are estimates only. Actual results depend on pricing, session volume, and operating model.</p>
    <p>Requests submitted through the contact or newsletter forms do not constitute a purchase contract. A tailored proposal is provided after consultation with Anovator GCC.</p>
</section>
@endsection
