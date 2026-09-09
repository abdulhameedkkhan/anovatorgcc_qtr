@extends('layouts.app')

@section('title', 'Search · Anovator GCC')

@section('content')
<section class="page-hero">
    <p class="breadcrumb"><a href="{{ route('home') }}">Home</a> / Search</p>
    <h1>Search</h1>
    <form action="{{ route('search') }}" method="get" class="search-form" style="margin-top:20px; max-width:640px">
        <input type="search" name="q" value="{{ $query }}" placeholder="Search products, news, industries" required>
        <button type="submit">Search</button>
    </form>
</section>

<section class="page-wrap">
    @if($query === '')
        <p>Enter a keyword to search Anovator products, news, industries, and support pages.</p>
    @elseif(count($results) === 0)
        <p>No results for “{{ $query }}”.</p>
        <p style="margin-top:12px"><a class="link-arrow" href="{{ route('products.index') }}">Browse all products</a></p>
    @else
        <p style="margin-bottom:18px;color:var(--muted)">{{ count($results) }} result{{ count($results) === 1 ? '' : 's' }} for “{{ $query }}”</p>
        @foreach($results as $result)
            <article class="search-result">
                <small>{{ $result['type'] }}</small>
                <h2><a href="{{ $result['url'] }}">{{ $result['title'] }}</a></h2>
                <p>{{ $result['text'] }}</p>
            </article>
        @endforeach
    @endif
</section>
@endsection
