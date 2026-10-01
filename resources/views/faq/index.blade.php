@extends('layouts.app')

@section('title', 'FAQ · Anovator GCC')
@section('description', 'Frequently asked questions about Anovator body composition analysis systems, reports, Arabic support, installation, and warranty.')

@section('content')
<section class="page-hero has-photo" style="background-image:url('{{ asset('images/photos/tile-lab.jpg') }}')">
    <p class="breadcrumb"><a href="{{ route('home') }}">Home</a> / FAQ</p>
    <p class="kicker">FAQ</p>
    <h1>Everything You Need to Know</h1>
    <p>Clear answers on how Anovator works, what makes it different, and how Anovator GCC supports facilities across the Gulf.</p>
</section>

<section class="page-wrap">
    @foreach($faqs as $faq)
        <article class="faq-item {{ $loop->first ? 'is-open' : '' }}">
            <button type="button">{{ $faq['q'] }}</button>
            <div class="faq-a">{{ $faq['a'] }}</div>
        </article>
    @endforeach

    <div class="cta-row">
        <a class="link-arrow" href="{{ route('contact') }}">Have more questions?</a>
        <a class="link-arrow" href="{{ route('products.index') }}">Explore all systems</a>
    </div>
</section>
@endsection
