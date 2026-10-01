@extends('layouts.app')

@section('title', 'Sectors We Serve | Anovator GCC')
@section('description', 'One smart assessment ecosystem tailored to healthcare, nutrition, sports, pharmacies, aesthetics, education, rehab, wellness, home use, and employee health.')

@section('content')
<section class="page-hero has-photo" style="background-image:url('{{ asset('images/photos/tile-clinic.jpg') }}')">
    <p class="breadcrumb"><a href="{{ route('home') }}">Home</a> / Sectors We Serve</p>
    <p class="kicker">Sectors We Serve</p>
    <h1>One Smart Assessment Ecosystem. Tailored to Every Sector’s Needs</h1>
    <p>Anovator GCC serves multiple sectors through advanced assessment solutions adapted to each facility’s environment, service model, user journey, and operational priorities.</p>
</section>

<section class="page-wrap">
    <div class="industry-grid">
        @foreach($industries as $industry)
            <article class="industry-card" id="{{ $industry['slug'] }}">
                @if(!empty($industry['icon']))
                    <img class="industry-thumb" src="{{ asset('images/'.$industry['icon']) }}?v=7" alt="" width="96" height="96" loading="lazy">
                @endif
                <span>{{ $industry['number'] }}</span>
                <h2>{{ $industry['title'] }}</h2>
                <p>{{ $industry['text'] }}</p>
                <p style="margin-top:12px"><a class="link-arrow" href="{{ route('contact') }}">Learn more</a></p>
            </article>
        @endforeach
    </div>

    <div class="cta-row" style="margin-top:40px">
        <a class="btn-solid" href="{{ route('contact') }}">Enhance the Assessment Experience. Elevate Service Value</a>
        <a class="link-arrow" href="{{ route('products.index') }}">Explore Our Systems</a>
    </div>
</section>
@endsection
