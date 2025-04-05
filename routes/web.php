<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; //Import AuthController agar dapat dipakai di routes

Route::get('/', function () {
    return view('welcome');
});

//Tampilin halaman register (form register)
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');

//Proses register saat user tekan submit button (POST request)
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

//Tampilin halaman login (form login)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

//Proses login saat user tekan submit button (POST request)
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

//Tampilin halaman dashboard setelah login berhasil
Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth')->name('dashboard');

//Logout dari aplikasi
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
