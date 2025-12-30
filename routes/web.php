<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', function () {
        return "HALAMAN ADMIN";
    });
});

Route::middleware(['auth', 'role:pegawai'])->group(function () {
    Route::get('/pegawai', function () {
        return "HALAMAN PEGAWAI";
    });
});

Route::middleware(['auth', 'role:kph'])->group(function () {
    Route::get('/kph', function () {
        return "HALAMAN KPH";
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
