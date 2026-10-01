<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'ANOVATOR GCC | Advanced Body Analysis & Health Assessment Systems')</title>
    <meta name="description" content="@yield('description', 'Smart solutions combining body composition analysis, posture assessment, selected health indicator assessments, and digital reporting for professional use.')">
    <link rel="icon" href="{{ asset('images/favicon.png') }}?v=4" type="image/png">
    <link rel="alternate icon" href="{{ asset('images/favicon.svg') }}" type="image/svg+xml">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    {{-- Primary English font loads first; Arabic font only when needed --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link id="font-cairo" href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700&display=swap" rel="stylesheet" media="not all" data-lazy-font="1">
    <noscript><link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700&display=swap" rel="stylesheet"></noscript>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}?v=29">
</head>
<body class="@yield('body_class')">
    @include('partials.header')
    <div class="nav-dim" id="nav-dim" aria-hidden="true"></div>
    <main>
        @yield('content')
    </main>
    @include('partials.footer')
    @include('partials.search-overlay')
    @include('partials.lang-panel')
    @include('partials.country-panel')
    <div id="google_translate_element" hidden aria-hidden="true"></div>
    <script src="{{ asset('js/app.js') }}?v=20" defer></script>
</body>
</html>
