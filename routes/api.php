<?php

//Import Route dan AuthApiController agar dapat digunakan
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthApiController;

//Endpoint register
Route::post('/register', [AuthApiController::class, 'register']); //Register user baru

//Endpoint login
Route::post('/login', [AuthApiController::class, 'login']); //Login dan get token

//Endpoint logout
Route::middleware('auth:api')->group(function () {
    Route::get('/user', [AuthApiController::class, 'user']); //Ambil data user yang sedang login
    Route::post('/logout', [AuthApiController::class, 'logout']); //Logout dan revoke token
});