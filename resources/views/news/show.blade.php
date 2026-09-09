@extends('layouts.app')

@section('title', $article['title'].' · Anovator GCC')
@section('description', $article['excerpt'])

@section('content')
<section class="page-hero">
    <p class="breadcrumb"><a href="{{ route('home') }}">Home</a> / <a href="{{ route('news.index') }}">News</a> / {{ $article['date'] }}</p>
    <p class="kicker">{{ $article['date'] }}</p>
    <h1>{{ $article['title'] }}</h1>
</section>

<section class="page-wrap prose">
    <div class="news-photo" style="min-height:380px;margin-bottom:28px;background-image:url('{{ asset('images/photos/'.$article['image']) }}')"></div>
    <p>{{ $article['body'] }}</p>
    <div class="cta-row">
        <a class="link-arrow" href="{{ route('news.index') }}">All news</a>
        <a class="link-arrow" href="{{ route('contact') }}">Contact Anovator GCC</a>
    </div>
</section>
@endsection
