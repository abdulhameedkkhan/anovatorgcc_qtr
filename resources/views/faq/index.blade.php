@extends('layouts.app')

@section('title', 'Body Composition Analyzer FAQ | Anovator GCC')
@section('description', 'Frequently asked questions about Anovator body composition analysis systems, reports, Arabic support, installation, support, and safety.')

@section('content')
<section class="page-hero has-photo" style="background-image:url('{{ asset('images/faq/faq-technology.jpg') }}?v=1')">
    <p class="breadcrumb"><a href="{{ route('home') }}">Home</a> / FAQ</p>
    <p class="kicker">FAQ</p>
    <h1>Frequently Asked Questions</h1>
</section>

<section class="page-wrap faq-groups-section">
    @foreach($faqs as $group)
        <article class="faq-group {{ $loop->even ? 'is-reversed' : '' }}">
            <div class="faq-group-questions">
                <header class="faq-group-head">
                    <span class="faq-group-number">{{ $group['number'] }}</span>
                    <h2>{{ $group['title'] }}</h2>
                </header>

                <div class="faq-group-items">
                    @foreach($group['items'] as $faq)
                        <article class="faq-item {{ $loop->parent->first && $loop->first ? 'is-open' : '' }}">
                            <button type="button">
                                <span class="faq-q-body">
                                    <span class="faq-num">{{ $faq['n'] }}</span>
                                    <span>{{ $faq['q'] }}</span>
                                </span>
                            </button>
                            <div class="faq-a">{{ $faq['a'] }}</div>
                        </article>
                    @endforeach
                </div>
            </div>

            <div class="faq-group-media">
                <img src="{{ asset('images/'.$group['image']) }}?v=1" alt="{{ $group['title'] }}" loading="lazy">
                <span class="faq-group-media-label">{{ $group['title'] }} {{ $group['number'] }}</span>
            </div>
        </article>
    @endforeach

    <div class="faq-more">
        <h2>Have More Questions?</h2>
        <p>The Anovator GCC team is available to answer your questions and provide the right support.</p>
        <div class="cta-row">
            <a class="link-arrow" href="{{ route('contact') }}">Contact Us</a>
            <a class="link-arrow" href="{{ route('products.index') }}">Explore All Systems</a>
        </div>
    </div>
</section>
@endsection
