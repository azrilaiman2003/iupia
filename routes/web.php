<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login');
Route::get('/register', 'App\Http\Controllers\Auth\RegisterController@showRegisterForm')->name('register');
Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@register');
Route::get('/logout', 'App\Http\Controllers\Auth\LogoutController@logout')->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //LogBook
    Route::get('me/logbook','App\Http\Controllers\LogbookController@index')->name('logbook');
    Route::get('me/logbook/create','App\Http\Controllers\LogbookController@create')->name('logbook.create');
    Route::post('me/logbook/store','App\Http\Controllers\LogbookController@store')->name('logbook.store');
    Route::get('me/logbook/{logbook}','App\Http\Controllers\LogbookController@show')->name('logbook.show');
    Route::get('me/logbook/{logbook}/edit','App\Http\Controllers\LogbookController@edit')->name('logbook.edit');
    Route::put('me/logbook/{logbook}','App\Http\Controllers\LogbookController@update')->name('logbook.update');
    Route::get('me/logbook/{id}/pdf', 'App\Http\Controllers\LogbookController@generatePDF')->name('logbook.pdf');

});
