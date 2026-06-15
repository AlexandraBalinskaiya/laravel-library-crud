<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Library')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>

<header class="border-bottom bg-white">
    <div class="container py-3">
        <nav class="d-flex justify-content-between align-items-center">

            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="/client/books">{{ __('books.menu') }}</a>
                </li>
            </ul>

            {{-- Перемикач мови --}}
            <div class="d-flex gap-2">
                <a href="{{ route('lang.switch', 'uk') }}">UA</a>
                <a href="{{ route('lang.switch', 'en') }}">EN</a>
            </div>

        </nav>
    </div>
</header>

<main class="container py-4">
    @yield('content')
</main>

</body>
</html>
