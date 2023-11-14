<?php

use App\Http\Controllers\Controller as Controllers;
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


// Routes for students
Route::get('/student/login', [App\Http\Controllers\Auth\StudentLoginController::class, 'showLoginForm'])->name('student.login');
Route::post('/student/login', [App\Http\Controllers\Auth\StudentLoginController::class, 'login']);
Route::middleware(['auth:student'])->group(function () {

    Route::group(['prefix' => 'student', 'as' => 'student.'], function () {

        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
        Route::post('logout', [App\Http\Controllers\Auth\StudentLoginController::class, 'logout'])->name('logout');

        //First Time Login
        Route::middleware('first_time_login')->group(function () {
            Route::get('verification', [App\Http\Controllers\Auth\StudentLoginController::class, 'showVerificationForm'])->name('verification');
            Route::post('verify', [App\Http\Controllers\Auth\StudentLoginController::class, 'verify'])->name('verify');
        });
        Route::get('/password/change', [App\Http\Controllers\Auth\StudentPasswordController::class, 'showChangePasswordForm'])->name('password.change');
        Route::post('/password/change', [App\Http\Controllers\Auth\StudentPasswordController::class, 'changePassword'])->name('password.update');

        //LogBook
        Route::resource('logbook', App\Http\Controllers\LogbookController::class);
        Route::get('logbook/{id}/pdf', 'App\Http\Controllers\LogbookController@generatePDF')->name('logbook.pdf');
    });
});


// Routes for industrial supervisors
Route::get('/industry/login', [App\Http\Controllers\Auth\IndustryLoginController::class, 'showLoginForm'])->name('industry.login');
Route::post('/industry/login', [App\Http\Controllers\Auth\IndustryLoginController::class, 'login']);;
Route::middleware(['auth:industry'])->group(function () {

    Route::group(['prefix' => 'industry', 'as' => 'industry.'], function () {

        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
        //LogBook
        Route::resource('logbook', App\Http\Controllers\LogbookController::class);
        Route::get('logbook/{id}/pdf', 'App\Http\Controllers\LogbookController@generatePDF')->name('logbook.pdf');
    });
});

// Routes for College supervisors
Route::get('/supervisor/login', [App\Http\Controllers\Auth\SupervisorLoginController::class, 'showLoginForm'])->name('supervisor.login');
Route::post('/supervisor/login', [App\Http\Controllers\Auth\SupervisorLoginController::class, 'login']);;
Route::middleware(['auth:supervisor'])->group(function () {

    Route::group(['prefix' => 'supervisor', 'as' => 'supervisor.'], function () {

        Route::get('/dashboard', function () { return view('dashboard');})->name('dashboard');

        //Student
        Route::get('student', [App\Http\Controllers\StudentController::class, 'index'])->name('student.index');

        //LogBook
        Route::resource('logbook', App\Http\Controllers\LogbookController::class);
        Route::get('logbook/{id}/pdf', 'App\Http\Controllers\LogbookController@generatePDF')->name('logbook.pdf');
    });
});
