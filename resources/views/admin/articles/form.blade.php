@extends('admin.layout')

@section('title', $article->exists ? 'Edit Article' : 'Add Article')
@section('heading', $article->exists ? 'Edit Article' : 'Add Article')
@section('subheading', $article->exists ? $article->title : 'Publish a new blog article')

@section('content')
<div class="admin-panel">
    <form class="admin-form" method="post" action="{{ $article->exists ? route('admin.articles.update', $article) : route('admin.articles.store') }}" enctype="multipart/form-data">
        @csrf
        @if($article->exists)
            @method('PUT')
        @endif

        <div class="admin-form-grid">
            <div class="admin-field">
                <label>Title *</label>
                <input type="text" name="title" value="{{ old('title', $article->title) }}" required>
            </div>
            <div class="admin-field">
                <label>Slug</label>
                <input type="text" name="slug" value="{{ old('slug', $article->slug) }}" placeholder="auto from title">
            </div>
            <div class="admin-field">
                <label>Date label *</label>
                <input type="text" name="date_label" value="{{ old('date_label', $article->date_label) }}" required>
                <div class="hint">Example: 19 July 2026</div>
            </div>
            <div class="admin-field">
                <label>Published at</label>
                <input type="date" name="published_at" value="{{ old('published_at', optional($article->published_at)->format('Y-m-d')) }}">
            </div>
            <div class="admin-field">
                <label>Author</label>
                <input type="text" name="author" value="{{ old('author', $article->author) }}">
            </div>
            <div class="admin-field">
                <label>Sort order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $article->sort_order ?? 0) }}" min="0">
            </div>
        </div>

        <div class="admin-field">
            <label>Excerpt *</label>
            <textarea name="excerpt" required>{{ old('excerpt', $article->excerpt) }}</textarea>
        </div>

        <div class="admin-form-grid">
            <div class="admin-field">
                <label>Upload image</label>
                <input type="file" name="image" accept="image/*">
                <div class="hint">Optional. Saved to public/images/blog</div>
            </div>
            <div class="admin-field">
                <label>Or image path</label>
                <input type="text" name="image_path" value="{{ old('image_path', $article->image) }}" placeholder="blog/my-article.jpg">
                @if($article->image)
                    <img class="thumb" style="margin-top:8px;width:120px;height:80px" src="{{ asset('images/'.$article->image) }}" alt="">
                @endif
            </div>
        </div>

        <div class="admin-field">
            <label>Body HTML *</label>
            <textarea name="body" style="min-height:320px" required>{{ old('body', $article->body) }}</textarea>
            <div class="hint">You can use HTML tags like &lt;p&gt;, &lt;h2&gt;, &lt;ul&gt;, &lt;li&gt;.</div>
        </div>

        <div class="admin-actions">
            <button class="btn" type="submit">Save article</button>
            <a class="btn btn-secondary" href="{{ route('admin.articles.index') }}">Cancel</a>
            @if($article->exists)
                <a class="btn btn-secondary" href="{{ route('blog.show', $article->slug) }}" target="_blank" rel="noopener">View on site</a>
            @endif
        </div>
    </form>
</div>
@endsection
