@extends('layouts.app')

@section('title', 'News · Anovator GCC')
@section('description', 'News from Anovator GCC on body composition assessment systems, regional support, and product updates.')

@section('content')
<section class="page-hero">
    <p class="breadcrumb"><a href="{{ route('home') }}">Home</a> / News</p>
    <p class="kicker">Anovator News</p>
    <h1>News from the company</h1>
</section>

<section class="page-wrap">
    <div class="news-grid">
        @foreach($articles as $article)
            <a class="news-card" href="{{ route('news.show', $article['slug']) }}">
                <div class="news-photo" style="background-image:url('{{ asset('images/photos/'.$article['image']) }}')"></div>
                <p class="kicker" style="margin-top:16px">{{ $article['date'] }}</p>
                <h3>{{ $article['title'] }}</h3>
            </a>
        @endforeach
    </div>
</section>
@endsection
