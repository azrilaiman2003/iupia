@extends('layouts.partials.main', [
    'breadcrumb_pages' => [
        'Settings' => route('industry.setting.index'),
],
])

@section('content')
<div class="bg-white dark:bg-gray-900 rounded-md">
    <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
        <form action="#">
            <h2 class="mb-4 text-xl font-semibold leading-none text-gray-900 dark:text-white">General Information</h2>
            <div class="grid gap-4 mb-4 md:gap-6 md:grid-cols-2 sm:mb-8">
                <div class="sm:col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload avatar</label>
                    <div class="items-center w-full sm:flex">
                        <img class="w-20 h-20 mb-4 rounded-full sm:mr-4 sm:mb-0" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/helene-engels.png" alt="Helene avatar">
                        <div class="w-full">
                            <input class="w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file">
                            <p class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                        </div>
                    </div>
                </div>
                <div class="sm:col-span-2">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full Name</label>
                    <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $data->name }}" placeholder="Ex. John" required="">
                </div>
            </div>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{$data->email}}" placeholder="Ex. name@company.com" required="">
                </div>
                <div>
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                    <input type="text" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{$data->phone}}" placeholder="Ex. 01124371722" required="">
                </div>
                <div>
                    <label for="position" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Position</label>
                    <input type="text" name="position" id="position" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="React Developer" placeholder="e.g React Native Developer" required="">
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="" placeholder="•••••••••" required="">
                </div>
                <div>
                    <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
                    <input type="password" name="confirm-password" id="confirm-password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="" placeholder="•••••••••" required="">
                </div>
                <div class="sm:col-span-2">
                    <label for="biography" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Biography</label>
                    <div class="w-full border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                        <div class="px-4 py-2 bg-white rounded-b-lg dark:bg-gray-800">
                            <textarea id="biography" rows="8" class="block w-full px-0 text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Write a message here" required="">Hello, I'm Helene Engels, USA Designer, Creating things that stand out, Featured by Adobe, Figma, Webflow and others, Daily design tips & resources, Exploring Web3.</textarea>
                        </div>
                    </div>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Assign Role</label>
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center">
                            <input id="inline-checkbox" type="checkbox" value="" name="role_checkbox" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="inline-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Administrator</label>
                        </div>
                        <div class="flex items-center">
                            <input id="inline-2-checkbox" type="checkbox" value="" name="role_checkbox" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="inline-2-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Member</label>
                        </div>
                        <div class="flex items-center">
                            <input checked="" id="inline-checked-checkbox" type="checkbox" value="" name="role_checkbox" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="inline-checked-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Viewer</label>
                        </div>
                    </div>
                </div>
            </div>
            <h2 class="mb-4 text-xl font-semibold leading-none text-gray-900 dark:text-white">Additional Information</h2>
            <div class="grid gap-4 mb-4 md:gap-6 md:grid-cols-2 sm:mb-8">
                <div>
                    <label for="country" class="mb-2 text-sm font-medium text-gray-900 dark:text-white">Country</label>
                    <select id="country" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected="">United States</option>
                        <option value="NO">Australia</option>
                        <option value="NO">United Kingdom</option>
                        <option value="NO">Italy</option>
                        <option value="NO">Germany</option>
                        <option value="NO">Spain</option>
                        <option value="NO">France</option>
                        <option value="NO">Canada</option>
                    </select>
                </div>
                <div>
                    <label for="city" class="mb-2 text-sm font-medium text-gray-900 dark:text-white">City</label>
                    <select id="city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected="">Los Angeles</option>
                        <option value="WA">Washington</option>
                        <option value="NW">New York</option>
                        <option value="SA">Sacramento</option>
                    </select>
                </div>
                <div>
                    <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                    <input type="text" name="address" id="adress" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="92 Miles Drive, Newark, NJ 07103..." placeholder="Your Location" required="">
                </div>
                <div>
                    <label for="zip" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ZIP</label>
                    <input type="number" name="zip" id="zip" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="2124436" placeholder="ZIP" required="">
                </div>
                <div>
                    <label for="timezone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Timezone</label>
                    <input type="text" name="timezone" id="timezone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="GMT+3" placeholder="e.g GMT+6" required="">
                </div>
                <div>
                    <label for="phone-number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
                    <input type="number" name="phone-number" id="phone-number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="3934567890" placeholder="Add a phone number" required="">
                </div>

                <div>
                    <label for="linkedin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Linkedin URL</label>
                    <input type="url" name="linkedin" id="linkedin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="https://www.linkedin.com/in/helene-example/" placeholder="LinkedIn URL" required="">
                </div>
                <div>
                    <label for="facebook" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Facebook</label>
                    <input type="url" name="facebook" id="facebook" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="@helene.fb" placeholder="Facebook Profile" required="">
                </div>
                <div>
                    <label for="github" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Github</label>
                    <input type="url" name="github" id="github" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="@helene" placeholder="Github Username" required="">
                </div>
                <div>
                    <label for="dribbble" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dribbble</label>
                    <input type="url" name="dribbble" id="dribbble" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="@helene.engels" placeholder="Dribbble Username" required="">
                </div>
                <div>
                    <label for="instagram" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instagram</label>
                    <input type="url" name="instagram" id="instagram" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="@helene.insta" placeholder="Instagram Username" required="">
                </div>
                <div>
                    <label for="personal-website" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Personal Website</label>
                    <input type="url" name="personal-website" id="personal-website" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="http://www.example.com" placeholder="http://www.example.com" required="">
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <button type="submit" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    Update user
                </button>
                <button type="button" class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                    <svg aria-hidden="true" class="w-5 h-5 mr-1 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                    Delete
                </button>
            </div>
        </form>
    </div>
</div>
  @endsection
