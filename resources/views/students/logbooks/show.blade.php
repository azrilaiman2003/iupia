@extends('layouts.partials.main')

@section('content')

<!-- Your existing content goes here -->

<div class="bg-white dark:bg-gray-900 rounded-lg">
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
        <!-- Your existing content goes here -->

        <h2 class="mb-4 text-xl text-center font-bold text-gray-900 dark:text-white">LAPORAN HARIAN LATIHAN INDUSTRI</h2>

        <!-- Your existing form goes here -->

        <iframe src="{{ route('logbook.pdf', ['id' => $logbook->id]) }}" width="100%" height="600px"></iframe>

        <!-- Your existing content goes here -->
    </div>
</div>

@endsection
