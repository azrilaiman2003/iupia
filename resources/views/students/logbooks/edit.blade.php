@extends('layouts.partials.main')

@section('content')

<div class="bg-white dark:bg-gray-900 rounded-lg">
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
        <h2 class="mb-4 text-xl text-center font-bold text-gray-900 dark:text-white">LAPORAN HARIAN LATIHAN INDUSTRI</h2>
        <form method="PUT" action="{{ route('logbook.update', ['logbook' => $logbook]) }}">
            @csrf
            <div class="mt-5 grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div>
                    <label for="name"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                    <input type="text" name="name" id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{ auth()->user()->name }}" readonly>
                </div>
                <div>
                    <label for="category"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                    <select id="category" name="category"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected="">Select category</option>
                        <option value="1">Harian</option>
                        <option value="2">Bulanan</option>
                        <option value="3">Akhir</option>
                    </select>
                </div>

                <div class="w-full">
                    <label for ="date"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tarikh</label>
                    <input datepicker type="text" name="date" id="date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{$logbook->date}}">
                </div>

                <div>
                    <label for="hari"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hari</label>
                    <select id="hari" name="hari"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected="0">Pilih Hari</option>
                        <option value="Isnin">Isnin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Khamis">Khamis</option>
                        <option value="Jumaat">Jumaat</option>
                        <option value="Sabtu">Sabtu</option>
                        <option value="Ahad">Ahad</option>
                    </select>
                </div>
                <div class="sm:col-span-2">
                    <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat /
                        Lokasi</label>
                    <input type="text" name="location" id="location"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{$logbook->location}}" required="">
                </div>
                <div class="sm:col-span-2">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tajuk
                        Kerja / Projek</label>
                    <input type="text" name="title" id="title"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{$logbook->title}}" required="">
                </div>
                <div class="sm:col-span-2">
                    <label for="field1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Peralatan
                        / Perisian yang digunakan</label>
                    <input type="text" name="field1" id="field1"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{$logbook->field1}}" required="">
                </div>
                <div class="sm:col-span-2">
                    <label for="field2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pengujian
                        yang dijalankan (sekiranya ada)</label>
                    <input type="text" name="field2" id="field2"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{$logbook->field2}}" required="">
                </div>
                <div class="sm:col-span-2">
                    <label for="field3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Langkah -
                        Langkah Keselamatan (sekiranya ada)</label>
                    <input type="text" name="field3" id="field3"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{$logbook->field3}}" required="">
                </div>
                <div class="sm:col-span-2">
                    <label for="field4"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Perincian Kerja/Projek
                        (Langkah kerja, pengiraan, carta / jadual dan gambar rajah yang bersesuaian perlu
                        disertakan)</label>
                    <textarea id="field4" rows="8" name="field4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{$logbook->field4}}"></textarea>
                </div>
                {{-- <div class="sm:col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file">Upload
                        File/Image</label>
                    <div class="items-center w-full sm:flex">
                        <div class="w-full">
                            <input
                                class="w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                aria-describedby="file_input_help" id="file" name="file" type="file">
                            <p class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-300" id="file_input_help">
                                PDF, SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                        </div>
                    </div>
                </div> --}}
            </div>
            <button type="submit"
                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-dark bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                Save Update
            </button>
        </form>
    </div>
</div>

@endsection
