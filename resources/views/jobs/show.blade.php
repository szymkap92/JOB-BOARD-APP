<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $job->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-10 px-4 max-w-4xl">
        <a href="{{ route('home') }}" class="text-blue-600 hover:underline mb-6 inline-block">&larr; Powrót do listy ofert</a>
        
        <div class="bg-white p-8 rounded-lg shadow-md">
            <h1 class="text-4xl font-bold text-gray-900 mb-2">{{ $job->title }}</h1>
            <p class="text-xl text-blue-600 mb-6">{{ $job->category->name }} | {{ $job->location }}</p>
            
            <hr class="mb-6">
            
            <div class="prose max-w-none text-gray-700 leading-relaxed">
                {!! $job->description !!}
            </div>

            <div class="mt-10 p-6 bg-blue-50 rounded-lg border border-blue-100">
                <h3 class="text-lg font-semibold mb-2">Zainteresowany tą ofertą?</h3>
                <p class="text-gray-600">Skontaktuj się z pracodawcą lub aplikuj bezpośrednio przez nasz system.</p>
                <button class="mt-4 bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">Aplikuj teraz</button>
            </div>
        </div>
    </div>
</body>
</html>