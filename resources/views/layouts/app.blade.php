<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Oferty Pracy') - Blachtex</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

    <header class="bg-gray-900 shadow-md">
        <div class="container mx-auto px-4 py-4 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <img src="{{ asset('images/logo.png') }}" alt="Blachtex" class="h-10">
            </a>
            <nav>
                <a href="{{ route('home') }}" class="text-gray-300 hover:text-brand transition font-medium">Oferty pracy</a>
            </nav>
        </div>
    </header>

    <main class="flex-1">
        @yield('content')
    </main>

    <footer class="bg-gray-900 text-gray-400 mt-12">
        <div class="container mx-auto px-4 py-6 text-center text-sm">
            &copy; {{ date('Y') }} Blachtex. Wszelkie prawa zastrzeżone.
        </div>
    </footer>

</body>

</html>
