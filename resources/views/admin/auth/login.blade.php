<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Login · Anovator GCC</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}?v=2">
</head>
<body class="admin-login-page">
    <div class="admin-login-page-grid">
        <aside class="admin-login-side">
            <div>
                <p class="admin-login-kicker">Anovator GCC</p>
                <h1>Website Admin</h1>
                <p>Manage products, blog articles, and contact inquiries from one place.</p>
            </div>
            <a class="admin-login-back" href="{{ route('home') }}">← Back to website</a>
        </aside>

        <main class="admin-login-main">
            <div class="admin-login-form-wrap">
                <h2>Sign in</h2>
                <p class="admin-login-lead">Enter your admin email and password to continue.</p>

                <form method="post" action="{{ route('admin.login.submit') }}" class="admin-form admin-login-form">
                    @csrf
                    <div class="admin-field">
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                        @error('email') <div class="admin-error">{{ $message }}</div> @enderror
                    </div>
                    <div class="admin-field">
                        <label for="password">Password</label>
                        <input id="password" type="password" name="password" required autocomplete="current-password">
                    </div>
                    <label class="admin-remember">
                        <input type="checkbox" name="remember" value="1">
                        <span>Remember me</span>
                    </label>
                    <button class="btn admin-login-submit" type="submit">Sign in</button>
                </form>
            </div>
        </main>
    </div>
</body>
</html>
