@extends('layouts.partials.main', [
    'breadcrumb_pages' => [
        'Institution' => route('admin.manage.institution.index'),
    ],
])

@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Institution Setting</h2>
            <form method="POST" action="{{ route('admin.manage.institution.update', ['institution' => 1]) }}"
                enctype="multipart/form-data">
                @csrf

                <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                    <div class="sm:col-span-2">
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Logo</label>
                        <div class="flex items-center justify-center w-full">
                            <label for="logo"
                                class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                        </path>
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                            class="font-semibold">Click to upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG or JPG (MAX. 800x400px)</p>
                                    <div
                                    class="group p-4 sm:p-7 mt-5 block cursor-pointer text-center border-2 border-dashed border-gray-200 rounded-lg focus-within:outline-none focus-within:ring-2 focus-within:ring-blue-500 focus-within:ring-offset-2 dark:border-gray-700">
                                    <div id="imagePreviewContainer" class="hidden mt-4">
                                        <img id="imagePreview" class="w-32 h-32 object-cover rounded-lg mx-auto"
                                            alt="Selected Image">
                                    </div>
                                </div>
                                </div>
                                <input id="logo" name="logo" type="file" value="asset" class="sr-only">
                            </label>
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ $institution->name ?? '' }}" placeholder="" required="">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="address"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                        <textarea id="address" name="address" rows="8"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="">{{ $institution->address ?? '' }}</textarea>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone
                            Number</label>
                        <input type="phone" name="phone" id="phone"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ $institution->phone ?? '' }}" placeholder="" required="">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="fax" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fax
                            Number</label>
                        <input type="text" name="fax" id="fax"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ $institution->fax ?? '' }}" placeholder="" required="">
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <button type="submit"
                        class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const bannerInput = document.getElementById('logo');
            const imagePreview = document.getElementById('imagePreview');
            const imagePreviewContainer = document.getElementById('imagePreviewContainer');
            const bannerLabel = document.getElementById('bannerLabel');

            const bannerPath = "{{ $banner_path ?? '' }}";

            const displayImage = (path) => {
                imagePreview.src = path;
                imagePreviewContainer.classList.remove('hidden');
                bannerLabel.classList.add('hidden');
            };

            bannerInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        displayImage(e.target.result);
                    };
                    reader.readAsDataURL(file);
                } else {
                    imagePreview.src = '';
                    imagePreviewContainer.classList.add('hidden');
                    bannerLabel.classList.remove('hidden');
                }
            });

            if (bannerPath) {
                displayImage(bannerPath);
            }
        });
    </script>
@endsection
