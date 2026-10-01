@extends('layouts.app')

@section('title', $article['title'].' · Anovator GCC')
@section('description', $article['excerpt'])

@section('content')
<section class="page-hero has-photo" style="background-image:url('{{ asset('images/'.$article['image']) }}?v=8')">
    <p class="breadcrumb"><a href="{{ route('home') }}">Home</a> / <a href="{{ route('blog.index') }}">Blog</a> / {{ $article['date'] }}</p>
    <p class="kicker">{{ $article['date'] }}@if(!empty($article['author'])) · {{ $article['author'] }}@endif</p>
    <h1>{{ $article['title'] }}</h1>
</section>

<section class="page-wrap prose">
    <div class="news-photo" style="min-height:380px;margin-bottom:28px;background-image:url('{{ asset('images/'.$article['image']) }}?v=8')"></div>
    {!! $article['body'] !!}
    <div class="cta-row">
        <a class="link-arrow" href="{{ route('blog.index') }}">All articles</a>
        <a class="link-arrow" href="{{ route('contact') }}">Contact Anovator GCC</a>
    </div>
</section>
@endsection
