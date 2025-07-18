<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listrik Pay - Aplikasi Pembayaran Listrik</title>

    {{-- @vite('resources/css/app.css') --}}
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="h-screen flex">
    <div class="flex h-full w-full">
        @if (!in_array(Route::currentRouteName(), ['login', 'register']))
            @include('components.sidebar')
        @endif

        {{-- Main Content --}}
        <main class="{{ !in_array(Route::currentRouteName(), ['login', 'register']) ? 'flex-1 overflow-y-auto' : 'h-full w-full' }}">
            @if (!in_array(Route::currentRouteName(), ['login', 'register']))
               @include('components.header')
            @endif
        <div class="{{ !in_array(Route::currentRouteName(), ['login', 'register']) ? 'p-6 max-w-6xl mx-auto' : 'h-full w-full' }}">
            @yield('content')
        </div>
        </main>
    </div>
</body>
</html>