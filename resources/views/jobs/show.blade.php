@extends('layouts.app')

@section('title', $job->title)

@section('content')
    <div class="container mx-auto py-10 px-4 max-w-4xl">
        <a href="{{ route('home') }}" class="text-gray-600 hover:text-brand transition mb-6 inline-block">&larr; Powrót do listy ofert</a>

        <div class="bg-white p-8 rounded-lg shadow-md">
            <h1 class="text-4xl font-bold text-gray-900 mb-2">{{ $job->title }}</h1>
            <p class="text-xl text-gray-600 mb-6">{{ $job->category->name }} | {{ $job->location }}</p>

            <hr class="mb-6">

            <div class="prose max-w-none text-gray-700 leading-relaxed">
                {!! $job->description !!}
            </div>

            <div class="mt-10 p-6 bg-gray-50 rounded-lg border border-gray-200">
                <h3 class="text-lg font-semibold mb-2">Zainteresowany tą ofertą?</h3>
                <p class="text-gray-600">Skontaktuj się z pracodawcą lub aplikuj bezpośrednio przez nasz system.</p>
                <button class="mt-4 bg-brand text-gray-900 font-semibold px-6 py-2 rounded-lg hover:bg-brand-dark transition">
                    Aplikuj teraz
                </button>
            </div>
        </div>
    </div>
@endsection
