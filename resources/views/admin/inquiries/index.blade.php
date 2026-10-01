@extends('admin.layout')

@section('title', 'Contact Inquiries')
@section('heading', 'Contact Inquiries')
@section('subheading', 'Demo and contact form submissions')

@section('content')
<div class="admin-panel">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Facility</th>
                <th>Date</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($inquiries as $inquiry)
                <tr>
                    <td>{{ $inquiry->full_name }}</td>
                    <td>{{ $inquiry->email }}</td>
                    <td>{{ $inquiry->phone ?: '—' }}</td>
                    <td>{{ $inquiry->facility_type ?: '—' }}</td>
                    <td>{{ $inquiry->created_at?->format('d M Y H:i') }}</td>
                    <td>
                        <div class="admin-actions">
                            <a class="btn btn-secondary" href="{{ route('admin.inquiries.show', $inquiry) }}">View</a>
                            <form method="post" action="{{ route('admin.inquiries.destroy', $inquiry) }}" onsubmit="return confirm('Delete this inquiry?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6">No inquiries yet.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div style="margin-top:16px">{{ $inquiries->links() }}</div>
</div>
@endsection
