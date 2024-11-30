<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Hash;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth/login', function () {
    return view('auth.login');
});
Route::get('/auth/register', function () {
    return view('auth.register');
});

Route::post('/auth/register', [UserController::class, 'register'])->name('register');
Route::post('/auth/login', [UserController::class, 'login'])->name('login');
Route::get('/app/dashboard', function () {
    return view('app.dashboard');
})->middleware('auth')->name('dashboard');
