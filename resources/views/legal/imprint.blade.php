@extends('layouts.app')

@section('title', 'Imprint · Anovator GCC')

@section('content')
<section class="page-hero has-photo" style="background-image:url('{{ asset('images/photos/hero-bg.jpg') }}')">
    <p class="breadcrumb"><a href="{{ route('home') }}">Home</a> / Imprint</p>
    <h1>Imprint</h1>
</section>
<section class="page-wrap prose">
    <p><strong>Anovator GCC</strong><br>
    Exclusive Gulf distributor for Anovator body composition analysis systems.</p>
    <p>
        Email: <a href="mailto:contact@anovatorgcc.com">contact@anovatorgcc.com</a><br>
        Phone: <a href="tel:+97450664777">+974 5066 4777</a> · <a href="tel:+97472020005">+974 7202 0005</a>
    </p>
    <p>Coverage: Qatar · United Arab Emirates · Saudi Arabia · Bahrain · Kuwait · Oman</p>
</section>
@endsection
