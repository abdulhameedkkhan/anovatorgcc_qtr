@extends('layouts.app')

@section('title', 'Blog — Body Analysis & Gulf Health | Anovator')
@section('description', 'Articles and insights on body composition analysis and health facility management in the Gulf.')

@section('content')
<section class="page-hero has-photo" style="background-image:url('{{ asset('images/photos/news-1.jpg') }}')">
    <p class="breadcrumb"><a href="{{ route('home') }}">Home</a> / Blog</p>
    <p class="kicker">Blog</p>
    <h1>Articles &amp; Insights</h1>
    <p>Tips and research on body composition analysis and health facility management in the Gulf.</p>
</section>

<section class="page-wrap">
    <div class="news-grid">
        @foreach($articles as $article)
            <a class="news-card" href="{{ route('blog.show', $article['slug']) }}">
                <div class="news-photo" style="background-image:url('{{ asset('images/photos/'.$article['image']) }}?v=7')"></div>
                <p class="kicker" style="margin-top:16px">{{ $article['date'] }}</p>
                <h3>{{ $article['title'] }}</h3>
            </a>
        @endforeach
    </div>
</section>
@endsection
