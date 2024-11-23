<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CRUDController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PropertyController;
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

Route::middleware('auth')->group(function () {
    Route::get('/properti', [CRUDController::class, 'index'])->name('properti.index');
    Route::post('/properti/create', [CRUDController::class, 'store'])->name('properti.store');
    Route::get('/properti/create', [CRUDController::class, 'create'])->name('properti.create');
    Route::get('/properti/{id}', [CRUDController::class, 'show'])->name('properti.show');
    Route::get('/properti/{id}/edit', [CRUDController::class, 'edit'])->name('properti.edit');
    Route::put('/properti/{id}/update', [CRUDController::class, 'update'])->name('properti.update');
    Route::delete('/properti/{id}/delete', [CRUDController::class, 'destroy'])->name('properti.destroy');

    // Tambahkan middleware 'role' untuk akses admin
    Route::middleware('role:admin')->group(function () {
        // Tambahkan routing khusus admin jika diperlukan
    });
});

Route::match(['get', 'post'], '/login', [AuthController::class, 'login'])->name('login');
Route::match(['get', 'post'], '/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [LandingPageController::class, 'index'])->name('landingpage');
