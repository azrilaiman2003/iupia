@extends('layouts.partials.main')

@section('content')
    <!-- Your existing content goes here -->

    <div class="bg-white dark:bg-gray-900 rounded-lg">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <!-- Your existing content goes here -->

            <h2 class="mb-4 text-xl text-center font-bold text-gray-900 dark:text-white">LAPORAN HARIAN LATIHAN INDUSTRI</h2>

            <!-- Your existing form goes here -->

            <iframe src="{{ route('industry.logbook.pdf', ['logbookId' => $logbook->id]) }}" width="100%"
                height="600px"></iframe>

            <!-- Your existing content goes here -->
        </div>
    </div>
    <div class="mt-4 divide-y divide-gray-200 overflow-hidden rounded-lh bg-white shadow rounded-md">
        <div class="p-4 sm:px-6">
            {{ 'Interaction Zone' }}
        </div>
        <div class="p-4 py-5 sm:px-6">
            <form method="POST" action="{{route('industry.logbook.approve', ['logbookId' => $logbook->id])}}" onsubmit="return confirm('Do you sure you want to continue?');"
                style="display: inline;">
                @csrf
                <input type="hidden" name="status" value="1">
                <button type="submit"
                    class="text-sm text-white bg-green-500 hover:bg-green-700 py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                    Approve
                </button>
                <button type="submit"
                    class="text-sm text-white bg-red-500 hover:bg-red-700 py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                    Reject
                </button>
            </form>
        </div>
    </div>
@endsection
