<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Route::get('/', function () {
//     return view('welcome');
// });
//
// Route::get('/register', function () {
//     return view('auth.register');
// });
//
// Route::get('/login', function () {
//     return view('auth.login');
// });
//
// Route::get('/logout', function () {
//     return view('logout');
// });

Route::match(['get', 'post'], '/login', [AuthController::class, 'login'])->name('login');
Route::match(['get', 'post'], '/register', [AuthController::class, 'register'])->name('register');

