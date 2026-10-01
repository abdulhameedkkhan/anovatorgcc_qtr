@extends('layouts.app')

@section('title', 'Industries · Anovator GCC')
@section('description', 'One solution across healthcare, nutrition, sports, pharmacies, aesthetics, education, rehabilitation, wellness, home use, and employee health programs.')

@section('content')
<section class="page-hero has-photo" style="background-image:url('{{ asset('images/photos/tile-clinic.jpg') }}')">
    <p class="breadcrumb"><a href="{{ route('home') }}">Home</a> / Industries</p>
    <p class="kicker">Industries We Serve</p>
    <h1>One Solution. Multiple Sectors.</h1>
    <p>Anovator — Trusted by Professionals. Designed to elevate assessment quality.</p>
</section>

<section class="page-wrap">
    <div class="industry-grid">
        @foreach($industries as $industry)
            <article class="industry-card" id="{{ $industry['slug'] }}">
                @if(!empty($industry['icon']))
                    <img class="industry-thumb" src="{{ asset('images/'.$industry['icon']) }}?v=4" alt="" width="96" height="96" loading="lazy">
                @endif
                <span>{{ $industry['number'] }}</span>
                <h2>{{ $industry['title'] }}</h2>
                <p>{{ $industry['text'] }}</p>
                <p style="margin-top:12px"><a class="link-arrow" href="{{ route('contact') }}">Learn more</a></p>
            </article>
        @endforeach
    </div>
</section>
@endsection
