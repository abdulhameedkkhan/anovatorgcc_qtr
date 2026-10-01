@extends('admin.layout')

@section('title', 'Inquiry')
@section('heading', 'Inquiry Detail')
@section('subheading', $inquiry->full_name)

@section('content')
<div class="admin-panel">
    <table class="admin-table">
        <tr><th>Name</th><td>{{ $inquiry->full_name }}</td></tr>
        <tr><th>Email</th><td><a href="mailto:{{ $inquiry->email }}">{{ $inquiry->email }}</a></td></tr>
        <tr><th>Phone</th><td>{{ $inquiry->phone ?: '—' }}</td></tr>
        <tr><th>Facility</th><td>{{ $inquiry->facility_type ?: '—' }}</td></tr>
        <tr><th>Submitted</th><td>{{ $inquiry->created_at?->format('d M Y H:i') }}</td></tr>
        <tr><th>Message</th><td style="white-space:pre-wrap">{{ $inquiry->message ?: '—' }}</td></tr>
    </table>
    <div class="admin-actions" style="margin-top:16px">
        <a class="btn btn-secondary" href="{{ route('admin.inquiries.index') }}">Back</a>
        <form method="post" action="{{ route('admin.inquiries.destroy', $inquiry) }}" onsubmit="return confirm('Delete this inquiry?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">Delete</button>
        </form>
    </div>
</div>
@endsection
