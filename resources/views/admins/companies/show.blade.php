@extends('layouts.partials.main', [
    'breadcrumb_pages' => [
        'Company' => route('admin.manage.company.index'),
    ],
])

@section('content')
    <div class="p-4 bg-white shadow-sm rounded-xl border px-4 lg:px-12">
        <!-- Start coding here -->
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <label for="assignTo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Assign to</label>
            <select id="assignTo"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Assign to</option>
                <option value="1">Student</option>
                <option value="2">Industry</option>
                <option value="3">Supervisor</option>
            </select>
        </div>

        <div id="studentTable" class="mt-5 relative overflow-x-auto shadow-md sm:rounded-lg" style="display: none;">
            @component('components.student-table', ['students' => $students, 'companyId' => $company])
            @endcomponent
        </div>

        <div id="industryTable" class="mt-5 relative overflow-x-auto shadow-md sm:rounded-lg" style="display: none;">
            @component('components.industry-table', ['industries' => $industries, 'companyId' => $company])
            @endcomponent
        </div>

        <div id="supervisorTable" class="mt-5 relative overflow-x-auto shadow-md sm:rounded-lg" style="display: none;">
            @component('components.supervisor-table', ['supervisors' => $supervisors, 'companyId' => $company])
            @endcomponent
        </div>

    </div>
    <!-- End block -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const assignToSelect = document.getElementById('assignTo');
            const studentTable = document.getElementById('studentTable');
            const industryTable = document.getElementById('industryTable');
            const supervisorTable = document.getElementById('supervisorTable');

            assignToSelect.addEventListener('change', function() {
                const selectedOption = assignToSelect.value;

                studentTable.style.display = 'none';
                industryTable.style.display = 'none';
                supervisorTable.style.display = 'none';

                if (selectedOption === '1') {
                    studentTable.style.display = 'block';
                } else if (selectedOption === '2') {
                    industryTable.style.display = 'block';
                } else if (selectedOption === '3') {
                    supervisorTable.style.display = 'block';
                }
            });
        });
    </script>
@endsection
