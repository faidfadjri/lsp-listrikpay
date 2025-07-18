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
</head>
<body class="h-screen flex">
    <main class="{{ !in_array(Route::currentRouteName(), ['login', 'register']) ? 'flex-1 overflow-y-auto' : 'h-full w-full' }}">
        @if (!in_array(Route::currentRouteName(), ['login', 'register']))
            <header class="bg-white shadow px-6 py-4 flex justify-between items-center">
                <h1 class="text-xl font-semibold">Dashboard</h1>
                <div class="text-sm text-gray-600">Hai, Faid 👋</div>
            </header>
        @endif
      <div class="{{ !in_array(Route::currentRouteName(), ['login', 'register']) ? 'p-6 max-w-6xl mx-auto' : 'h-full w-full' }}">
        @yield('content')
      </div>
    </main>
</body>
</html>