@extends('layouts.app')

@section('title', 'Page not found · Anovator GCC')

@section('content')
<section class="page-hero has-photo" style="background-image:url('{{ asset('images/photos/hero-bg.jpg') }}')">
    <h1>Page not found</h1>
    <p>The requested page does not exist. Please return to the homepage or use search.</p>
    <div class="cta-row">
        <a class="link-arrow" href="{{ route('home') }}">Back to homepage</a>
        <a class="link-arrow" href="{{ route('products.index') }}">All products</a>
    </div>
</section>
@endsection
