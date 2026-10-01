@extends('admin.layout')

@section('title', 'Change Password')
@section('heading', 'Change Password')
@section('subheading', 'Enter your current password, then set a new one')

@section('content')
<div class="admin-panel" style="max-width:560px">
    <form class="admin-form" method="post" action="{{ route('admin.password.update') }}">
        @csrf
        @method('PUT')

        <div class="admin-field">
            <label for="current_password">Current password *</label>
            <input id="current_password" type="password" name="current_password" required autocomplete="current-password">
            @error('current_password') <div class="admin-error">{{ $message }}</div> @enderror
        </div>

        <div class="admin-field">
            <label for="password">New password *</label>
            <input id="password" type="password" name="password" required autocomplete="new-password" minlength="8">
            <div class="hint">Minimum 8 characters</div>
            @error('password') <div class="admin-error">{{ $message }}</div> @enderror
        </div>

        <div class="admin-field">
            <label for="password_confirmation">Confirm new password *</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" minlength="8">
        </div>

        <div class="admin-actions">
            <button class="btn" type="submit">Update password</button>
        </div>
    </form>
</div>
@endsection
