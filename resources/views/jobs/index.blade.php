<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oferty Pracy</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto py-10 px-4">
        <h1 class="text-4xl font-bold text-center mb-10 text-gray-800">Dostępne Oferty Pracy</h1>

        <div class="bg-white p-6 rounded-lg shadow-md mb-8">
            <form action="{{ route('home') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <input type="text" name="search" placeholder="Szukaj po tytule lub treści..." 
                       class="border p-2 rounded w-full" value="{{ request('search') }}">
                
                <input type="text" name="location" placeholder="Lokalizacja..." 
                       class="border p-2 rounded w-full" value="{{ request('location') }}">

                <select name="category" class="border p-2 rounded w-full">
                    <option value="">Wszystkie kategorie</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

                <button type="submit" class="bg-blue-600 text-white p-2 rounded hover:bg-blue-700 transition">
                    Filtruj wyniki
                </button>
            </form>
        </div>

        <div class="grid grid-cols-1 gap-6">
            @forelse($jobs as $job)
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition border-l-4 border-blue-500">
                    <div class="flex justify-between items-start">
                        <div>
                            <h2 class="text-2xl font-semibold text-gray-900">{{ $job->title }}</h2>
                            <p class="text-blue-600 font-medium">{{ $job->category->name }} | {{ $job->location }}</p>
                        </div>
                        <span class="text-sm text-gray-500">Dodano: {{ $job->created_at->format('d.m.Y') }}</span>
                    </div>
                    <div class="mt-4 text-gray-700">
                        {!! Str::limit($job->description, 200) !!}
                    </div>
                    <a href="{{ route('jobs.show', $job) }}" class="inline-block mt-4 text-blue-500 font-semibold hover:underline">Zobacz szczegóły &rarr;</a>
                </div>
            @empty
                <div class="text-center py-10 bg-white rounded shadow">
                    <p class="text-gray-500 text-xl">Nie znaleziono ofert spełniających kryteria.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $jobs->links() }}
        </div>
    </div>

</body>
</html>