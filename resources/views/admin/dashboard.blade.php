@extends('admin.layout')

@section('title', 'Dashboard')
@section('heading', 'Dashboard')
@section('subheading', 'Overview of website content and leads')

@section('content')
<div class="admin-cards">
    <a class="admin-card" href="{{ route('admin.products.index') }}">
        <span>Products</span>
        <strong>{{ $productsCount }}</strong>
    </a>
    <a class="admin-card" href="{{ route('admin.articles.index') }}">
        <span>Blog Articles</span>
        <strong>{{ $articlesCount }}</strong>
    </a>
    <a class="admin-card" href="{{ route('admin.inquiries.index') }}">
        <span>Contact Inquiries</span>
        <strong>{{ $inquiriesCount }}</strong>
    </a>
</div>

<div class="admin-panel">
    <div class="admin-toolbar">
        <h2>Latest inquiries</h2>
        <a class="btn btn-secondary" href="{{ route('admin.inquiries.index') }}">View all</a>
    </div>
    <table class="admin-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Facility</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse($latestInquiries as $inquiry)
                <tr>
                    <td><a href="{{ route('admin.inquiries.show', $inquiry) }}">{{ $inquiry->full_name }}</a></td>
                    <td>{{ $inquiry->email }}</td>
                    <td>{{ $inquiry->facility_type ?: '—' }}</td>
                    <td>{{ $inquiry->created_at?->format('d M Y') }}</td>
                </tr>
            @empty
                <tr><td colspan="4">No inquiries yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="admin-panel">
    <div class="admin-toolbar">
        <h2>Latest articles</h2>
        <a class="btn" href="{{ route('admin.articles.create') }}">Add article</a>
    </div>
    <table class="admin-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Date</th>
                <th>Author</th>
            </tr>
        </thead>
        <tbody>
            @forelse($latestArticles as $article)
                <tr>
                    <td><a href="{{ route('admin.articles.edit', $article) }}">{{ $article->title }}</a></td>
                    <td>{{ $article->date_label }}</td>
                    <td>{{ $article->author ?: '—' }}</td>
                </tr>
            @empty
                <tr><td colspan="3">No articles yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
