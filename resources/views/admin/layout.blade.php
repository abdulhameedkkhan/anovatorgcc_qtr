<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') · Anovator GCC</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}?v=3">
</head>
<body>
    <div class="admin-shell">
        <aside class="admin-sidebar">
            <a class="admin-brand" href="{{ route('admin.dashboard') }}">
                <strong>ANOVATOR</strong>
                <span>Admin Panel</span>
            </a>
            <nav>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'is-active' : '' }}">Dashboard</a>
                <a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products.*') ? 'is-active' : '' }}">Products</a>
                <a href="{{ route('admin.articles.index') }}" class="{{ request()->routeIs('admin.articles.*') ? 'is-active' : '' }}">Blog Articles</a>
                <a href="{{ route('admin.inquiries.index') }}" class="{{ request()->routeIs('admin.inquiries.*') ? 'is-active' : '' }}">Contact Inquiries</a>
                <a href="{{ route('admin.password.edit') }}" class="{{ request()->routeIs('admin.password.*') ? 'is-active' : '' }}">Change Password</a>
                <a href="{{ route('home') }}" target="_blank" rel="noopener">View Website</a>
            </nav>
            <form method="post" action="{{ route('admin.logout') }}" class="admin-logout">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </aside>
        <div class="admin-main">
            <header class="admin-top">
                <div>
                    <h1>@yield('heading', 'Dashboard')</h1>
                    <p>@yield('subheading', 'Manage Anovator GCC website content')</p>
                </div>
                <div class="admin-user">{{ auth()->user()->name }}</div>
            </header>
            @if(session('success'))
                <div class="admin-alert">{{ session('success') }}</div>
            @endif
            <div class="admin-content">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
