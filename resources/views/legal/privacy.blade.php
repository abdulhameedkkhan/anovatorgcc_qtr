@extends('layouts.app')

@section('title', 'Data protection · Anovator GCC')

@section('content')
<section class="page-hero has-photo" style="background-image:url('{{ asset('images/photos/hero-bg.jpg') }}')">
    <p class="breadcrumb"><a href="{{ route('home') }}">Home</a> / Data protection</p>
    <h1>Data protection information</h1>
</section>
<section class="page-wrap prose">
    <p>Anovator GCC collects contact details submitted through this website solely to respond to product, demo, and support inquiries, and to send the newsletter when you have requested it.</p>
    <p>Inquiry and newsletter records are stored on our application database and are used by the Anovator GCC team covering Qatar, the UAE, Saudi Arabia, Bahrain, Kuwait, and Oman.</p>
    <p>You may request access, correction, or deletion of your personal data by writing to <a href="mailto:contact@anovatorgcc.com">contact@anovatorgcc.com</a>.</p>
</section>
@endsection
