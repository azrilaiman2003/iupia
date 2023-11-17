@php
    $items = $data['items'];
    $companyId = $data['companyId'];
    $totalCount = $data['totalCount'];

    $tableHeaders = [
        'student' => [
            'Name',
            'Student ID',
            'Current Company',
            'Phone',
            'Action'
        ],
        'industry' => [
            'Name',
            'Email',
            'Current Company',
            'Phone',
            'Action'
        ],
        'supervisor' => [
            'Name',
            'Email',
            'Current Company',
            'Phone',
            'Action'
        ]
    ];

    $headers = $tableHeaders[$tableType];

    $dataFields = [
        'student' => ['name', 'college_number', 'company.name', 'phone'],
        'industry' => ['name', 'email', 'company_id.name', 'phone'],
        'supervisor' => ['name', 'email', 'company_id.name', 'phone']
    ];

    $fields = $dataFields[$tableType];
@endphp

<div id="{{ $tableType }}Table" class="mt-20 relative overflow-x-auto shadow-md sm:rounded-lg" style="display: none;">
    <div class="ml-4 mt-3 pb-4 bg-white dark:bg-gray-900">
        <label for="table-search" class="sr-only">Search</label>
        <!-- Your search input code here -->
    </div>

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                @foreach ($headers as $header)
                    <th scope="col" class="px-6 py-3">{{ $header }}</th>
                @endforeach
            </tr>
        </thead>

        <tbody>
            @foreach ($items as $item)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    @foreach ($fields as $field)
                        <td class="px-6 py-4">
                            @php
                                $fieldNames = explode('.', $field);
                                $fieldValue = $item;
                                foreach ($fieldNames as $fieldName) {
                                    $fieldValue = $fieldValue->{$fieldName} ?? null;
                                }
                                echo $fieldValue ?? 'N/A';
                            @endphp
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>

    <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
        <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
            Showing
            <span class="font-semibold text-gray-900 dark:text-white">{{ $items->firstItem() }}</span>
            -
            <span class="font-semibold text-gray-900 dark:text-white">{{ $items->lastItem() }}</span>
            of
            <span class="font-semibold text-gray-900 dark:text-white">{{ $totalCount }}</span>
        </span>
        {{ $items->links('vendor.pagination.custom') }}
    </nav>
</div>
