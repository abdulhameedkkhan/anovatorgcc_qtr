@extends('layouts.app')

@section('title', 'Blog — Body Analysis & Gulf Health | Anovator')
@section('description', 'Tips and research on body composition analysis and health facility management in the Gulf.')

@section('content')
@php
    $heroImage = collect($articles)->first()['image'] ?? 'photos/news-1.jpg';
@endphp
<section class="page-hero has-photo" style="background-image:url('{{ asset('images/'.$heroImage) }}?v=8')">
    <p class="breadcrumb"><a href="{{ route('home') }}">Home</a> / Blog</p>
    <p class="kicker">Blog</p>
    <h1>Articles &amp; Ideas</h1>
    <p>Tips and research on body composition analysis and health facility management in the Gulf.</p>
</section>

<section class="page-wrap">
    <p class="kicker" style="margin-bottom:18px">{{ count($articles) }} articles</p>
    <div class="news-grid">
        @foreach($articles as $article)
            <a class="news-card" href="{{ route('blog.show', $article['slug']) }}">
                <div class="news-photo" style="background-image:url('{{ asset('images/'.$article['image']) }}?v=8')"></div>
                <p class="kicker" style="margin-top:16px">{{ $article['date'] }}@if(!empty($article['author'])) · {{ $article['author'] }}@endif</p>
                <h3>{{ $article['title'] }}</h3>
                <p>{{ $article['excerpt'] }}</p>
            </a>
        @endforeach
    </div>
</section>
@endsection
