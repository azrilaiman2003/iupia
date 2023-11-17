@props(['headers', 'data', 'totalCount'])

@php
    // Check if $data is a string (possibly JSON-encoded), then decode it
    $decodedData = is_string($data) ? json_decode($data, true) : $data;
@endphp

<div class="ml-4 mt-3 pb-4 bg-white dark:bg-gray-900">
    <!-- Search input section -->
    <label for="table-search" class="sr-only">Search</label>
    <div class="relative mt-1">
        <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
            </svg>
        </div>
        <input type="text" id="table-search"
            class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Search for items">
    </div>
</div>

<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <!-- Table headers -->
            @foreach ($headers as $header)
                <th scope="col" class="px-6 py-3">
                    {{ $header }}
                </th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        <!-- Table rows -->
        @if (is_array($decodedData))
            @foreach ($decodedData as $item)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <!-- Table cells -->
                    @foreach ($item as $cell)
                        <td class="px-6 py-4">
                            {{ $cell }}
                        </td>
                    @endforeach
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="{{ count($headers) }}">No data available</td>
            </tr>
        @endif
    </tbody>
</table>

<nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
    <!-- Table navigation information -->
    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
        Showing
        <span class="font-semibold text-gray-900 dark:text-white">{{ $data->firstItem() }}</span>
        -
        <span class="font-semibold text-gray-900 dark:text-white">{{ $data->lastItem() }}</span>
        of
        <span class="font-semibold text-gray-900 dark:text-white">{{ $totalCount }}</span>
    </span>
    {{ $data->links('vendor.pagination.custom') }}
</nav>
