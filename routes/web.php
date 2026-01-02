<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\GolonganController;
use App\Http\Controllers\Admin\JabatanController;
use App\Http\Controllers\Admin\UnitKerjaController;
use App\Http\Controllers\Admin\LogController;
use App\Http\Controllers\Admin\PegawaiController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\RiwayatKepegawaianController;
use App\Http\Controllers\Pegawai\DashboardController as PegawaiDashboard;
use App\Http\Controllers\KPH\DashboardController as KphDashboard;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');

    Route::get('/register', [RegisterController::class, 'index'])->name('register.index');

    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');

    Route::get('/riwayat-kepegawaian', [RiwayatKepegawaianController::class, 'index'])->name('riwayat_kepegawaian.index');

    Route::get('/golongan', [GolonganController::class, 'index'])->name('index.golongan');
    Route::post('/golongan', [GolonganController::class, 'store'])->name('store.golongan');
    Route::put('/golongan/{id}', [GolonganController::class, 'update'])->name('update.golongan');
    Route::delete('/golongan/{id}', [GolonganController::class, 'delete'])->name('delete.golongan');

    Route::get('/jabatan', [JabatanController::class, 'index'])->name('index.jabatan');
    Route::post('/jabatan', [JabatanController::class, 'store'])->name('store.jabatan');
    Route::put('/jabatan/{id}', [JabatanController::class, 'update'])->name('update.jabatan');
    Route::delete('/jabatan/{id}', [JabatanController::class, 'delete'])->name('delete.jabatan');

    Route::get('/unitkerja', [UnitKerjaController::class, 'index'])->name('index.unitkerja');
    Route::post('/unitkerja', [UnitKerjaController::class, 'store'])->name('store.unitkerja');
    Route::put('/unitkerja/{id}', [UnitKerjaController::class, 'update'])->name('update.unitkerja');
    Route::delete('/unitkerja/{id}', [UnitKerjaController::class, 'delete'])->name('delete.unitkerja');

    Route::get('/logs', [LogController::class, 'index'])->name('logs.index');
});

Route::middleware(['auth', 'role:pegawai'])->prefix('pegawai')->name('pegawai.')->group(function () {
    Route::get('/dashboard', [PegawaiDashboard::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'role:kph'])->prefix('kph')->name('kph.')->group(function () {
    Route::get('/dashboard', [KphDashboard::class, 'index'])->name('dashboard');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
