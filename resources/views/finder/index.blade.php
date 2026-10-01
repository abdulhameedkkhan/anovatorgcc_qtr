@extends('layouts.app')

@section('title', 'Product finder · Anovator GCC')
@section('description', 'Find the right Anovator assessment system for your facility. Guaranteed guidance for A5, M3, M1, M0, P5, and M2 Pro.')

@section('content')
<section class="page-hero has-photo" style="background-image:url('{{ asset('images/photos/mega-finder.jpg') }}')">
    <p class="breadcrumb"><a href="{{ route('home') }}">Home</a> / Product finder</p>
    <p class="kicker">Product finder</p>
    <h1>Find the Right Assessment System</h1>
    <p>Contact our team — or answer three questions — to identify the Anovator system that fits your facility type, assessment focus, and operating scale.</p>
</section>

<section class="page-wrap">
    <form class="finder-steps" method="get" action="{{ route('finder') }}">
        <div>
            <h2>01 Facility type</h2>
            <div class="choice-group">
                @foreach(['clinical' => 'Clinic / hospital', 'nutrition' => 'Nutrition / wellness', 'fitness' => 'Fitness / sports', 'other' => 'Other'] as $value => $label)
                    <label class="choice {{ $facility === $value ? 'is-selected' : '' }}">
                        <input type="radio" name="facility" value="{{ $value }}" @checked($facility === $value) required style="display:none">
                        {{ $label }}
                    </label>
                @endforeach
            </div>
        </div>
        <div>
            <h2>02 Assessment focus</h2>
            <div class="choice-group">
                @foreach(['essential' => 'Essential body composition', 'progress' => 'Progress & posture tracking', 'visual' => '360° imaging & visual documentation', 'performance' => 'Sports performance testing', 'full' => 'Full health assessment'] as $value => $label)
                    <label class="choice {{ $focus === $value ? 'is-selected' : '' }}">
                        <input type="radio" name="focus" value="{{ $value }}" @checked($focus === $value) required style="display:none">
                        {{ $label }}
                    </label>
                @endforeach
            </div>
        </div>
        <div>
            <h2>03 System scale</h2>
            <div class="choice-group">
                @foreach(['compact' => 'Compact / space-saving', 'professional' => 'Professional daily use', 'flagship' => 'Flagship all-in-one'] as $value => $label)
                    <label class="choice {{ $scale === $value ? 'is-selected' : '' }}">
                        <input type="radio" name="scale" value="{{ $value }}" @checked($scale === $value) required style="display:none">
                        {{ $label }}
                    </label>
                @endforeach
            </div>
        </div>
        <button class="text-submit" type="submit">Show recommendation</button>
    </form>

    @if($recommendation)
        <div class="result-box">
            <p class="kicker">Recommended system</p>
            <h2>{{ $recommendation['name'] }}</h2>
            <p>{{ $recommendation['headline'] }}</p>
            <div class="cta-row">
                <a class="link-arrow" href="{{ route('products.show', $recommendation['slug']) }}">View {{ $recommendation['name'] }}</a>
                <a class="link-arrow" href="{{ route('contact') }}">Request a demo</a>
            </div>
        </div>
    @endif
</section>
@endsection
