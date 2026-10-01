@extends('admin.layout')

@section('title', 'Blog Articles')
@section('heading', 'Blog Articles')
@section('subheading', 'Manage articles shown on Blog and Home')

@section('content')
<div class="admin-panel">
    <div class="admin-toolbar">
        <h2>{{ $articles->count() }} articles</h2>
        <a class="btn" href="{{ route('admin.articles.create') }}">Add article</a>
    </div>
    <table class="admin-table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Date</th>
                <th>Order</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
                <tr>
                    <td>
                        <img class="thumb" src="{{ asset('images/'.$article->image) }}" alt="">
                    </td>
                    <td>
                        <strong>{{ $article->title }}</strong><br>
                        <span style="color:#6b7077">{{ $article->slug }}</span>
                    </td>
                    <td>{{ $article->date_label }}</td>
                    <td>{{ $article->sort_order }}</td>
                    <td>
                        <div class="admin-actions">
                            <a class="btn btn-secondary" href="{{ route('admin.articles.edit', $article) }}">Edit</a>
                            <form method="post" action="{{ route('admin.articles.destroy', $article) }}" onsubmit="return confirm('Delete this article?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
