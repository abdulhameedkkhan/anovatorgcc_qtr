<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Anovator GCC') · Advanced Body Analysis</title>
    <meta name="description" content="@yield('description', 'Anovator GCC supplies advanced 8-electrode BIA body composition analysis systems across Qatar, UAE, Saudi Arabia, Bahrain, Kuwait, and Oman.')">
    <link rel="icon" href="{{ asset('images/favicon.svg') }}" type="image/svg+xml">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}?v=11">
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
    <script src="{{ asset('js/app.js') }}?v=12"></script>
    <script>
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                includedLanguages: 'en,ar,ur,fa,hi,fr',
                autoDisplay: false
            }, 'google_translate_element');
        }
    </script>
    <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" defer></script>
</body>
</html>
