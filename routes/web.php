<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Models\User;


//Home
Route::get('/', function () {
    return view('welcome');
});

//view return with help of contoller
Route::get('/contact', [ContactController::class, 'show']);

Route::get('/about', function () {
    return view('about');
})->middleware('CheckAge');

Route::get('/services-it-is-a-rout-with-the-help-of-rout', function () {
    return view('services');
})->name('serv');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/getDataTableForm', function () {
    $users = User::all();
    return view('getDataTableForm', compact('users'));
});

