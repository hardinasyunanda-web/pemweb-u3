<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Beranda') | KabarKita</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header class="site-header">
        <div class="container">
            <nav class="nav" aria-label="Navigasi utama">
                @include('partials.nav')
            </nav>
        </div>
    </header>

    <div class="container page">
        @if (session('success'))
            <div class="alert flash" role="status">{{ session('success') }}</div>
        @endif
        <main>
            @yield('content')
        </main>
    </div>

    <footer class="site-footer">
        <div class="container">
            <p class="muted">&copy; {{ date('Y') }} KabarKita &middot; Portal berita sederhana berbasis Laravel.</p>
        </div>
    </footer>
</body>
</html>
