@extends('layouts.app')

@section('title', 'Dostępne Oferty Pracy')

@section('content')
    <div class="container mx-auto py-10 px-4">
        <h1 class="text-4xl font-bold text-center mb-10 text-gray-800">Dostępne Oferty Pracy</h1>

        <div class="bg-white p-6 rounded-lg shadow-md mb-8">
            <form action="{{ route('home') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <input type="text" name="search" placeholder="Szukaj po tytule lub treści..."
                       class="border border-gray-300 p-2 rounded w-full focus:outline-none focus:ring-2 focus:ring-brand"
                       value="{{ request('search') }}">

                <input type="text" name="location" placeholder="Lokalizacja..."
                       class="border border-gray-300 p-2 rounded w-full focus:outline-none focus:ring-2 focus:ring-brand"
                       value="{{ request('location') }}">

                <select name="category" class="border border-gray-300 p-2 rounded w-full focus:outline-none focus:ring-2 focus:ring-brand">
                    <option value="">Wszystkie kategorie</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

                <button type="submit" class="bg-brand text-gray-900 font-semibold p-2 rounded hover:bg-brand-dark transition">
                    Filtruj wyniki
                </button>
            </form>
        </div>

        <div class="grid grid-cols-1 gap-6">
            @forelse($jobs as $job)
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition border-l-4 border-brand">
                    <div class="flex justify-between items-start">
                        <div>
                            <h2 class="text-2xl font-semibold text-gray-900">{{ $job->title }}</h2>
                            <p class="text-gray-600 font-medium mt-1">{{ $job->category->name }} | {{ $job->location }}</p>
                        </div>
                        <span class="text-sm text-gray-500">Dodano: {{ $job->created_at->format('d.m.Y') }}</span>
                    </div>
                    <div class="mt-4 text-gray-700">
                        {{ Str::limit(strip_tags($job->description), 200) }}
                    </div>
                    <a href="{{ route('jobs.show', $job) }}"
                       class="inline-block mt-4 text-gray-900 font-semibold hover:text-brand transition">
                        Zobacz szczegóły &rarr;
                    </a>
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
@endsection
