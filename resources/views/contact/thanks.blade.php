@extends('layouts.app')

@section('title', 'Thank you · Anovator GCC')

@section('content')
<section class="page-hero has-photo" style="background-image:url('{{ asset('images/photos/hero-bg.jpg') }}')">
    <p class="breadcrumb"><a href="{{ route('home') }}">Home</a> / Contact</p>
    <h1>Thank you</h1>
    <p>Your request has been received. The Anovator GCC team will reply within 24 hours.</p>
    <div class="cta-row">
        <a class="link-arrow" href="{{ route('home') }}">Back to homepage</a>
        <a class="link-arrow" href="{{ route('products.index') }}">Explore systems</a>
    </div>
</section>
@endsection
