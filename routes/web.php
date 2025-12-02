<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TahunAjarController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::redirect('/', 'login');
Route::redirect('/register', 'login');

Route::middleware(['auth'])->group(function () {
    // Dashboard - bisa diakses semua role
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Routes untuk semua role (siswa hanya bisa lihat index & show)
    Route::get('/tahun-ajar', [TahunAjarController::class, 'index'])->name('tahun-ajar.index');
    Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan.index');
    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
    Route::get('/siswa/{siswa}', [SiswaController::class, 'show'])->name('siswa.show');

    // Routes untuk admin & guru (tambah, edit, hapus) - HAPUS MIDDLEWARE ROLE
    // Tahun Ajar CRUD
    Route::get('/tahun-ajar/create', [TahunAjarController::class, 'create'])->name('tahun-ajar.create');
    Route::post('/tahun-ajar', [TahunAjarController::class, 'store'])->name('tahun-ajar.store');
    Route::get('/tahun-ajar/{tahunAjar}/edit', [TahunAjarController::class, 'edit'])->name('tahun-ajar.edit');
    Route::put('/tahun-ajar/{tahunAjar}', [TahunAjarController::class, 'update'])->name('tahun-ajar.update');
    Route::delete('/tahun-ajar/{tahunAjar}', [TahunAjarController::class, 'destroy'])->name('tahun-ajar.destroy');

    // Jurusan CRUD
    Route::get('/jurusan/create', [JurusanController::class, 'create'])->name('jurusan.create');
    Route::post('/jurusan', [JurusanController::class, 'store'])->name('jurusan.store');
    Route::get('/jurusan/{jurusan}/edit', [JurusanController::class, 'edit'])->name('jurusan.edit');
    Route::put('/jurusan/{jurusan}', [JurusanController::class, 'update'])->name('jurusan.update');
    Route::delete('/jurusan/{jurusan}', [JurusanController::class, 'destroy'])->name('jurusan.destroy');

    // Kelas CRUD
    Route::get('/kelas/create', [KelasController::class, 'create'])->name('kelas.create');
    Route::post('/kelas', [KelasController::class, 'store'])->name('kelas.store');
    Route::get('/kelas/{kelas}/edit', [KelasController::class, 'edit'])->name('kelas.edit');
    Route::put('/kelas/{kelas}', [KelasController::class, 'update'])->name('kelas.update');
    Route::delete('/kelas/{kelas}', [KelasController::class, 'destroy'])->name('kelas.destroy');

    // Siswa CRUD
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
    Route::get('/siswe', [SiswaController::class, 'create'])->name('siswa.create');
    Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
    Route::get('/siswa/{siswa}', [SiswaController::class, 'show'])->name('siswa.show');
    Route::get('/siswa/{siswa}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::put('/siswa/{siswa}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/siswa/{siswa}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
    Route::post('/siswa/{siswa}/naik-kelas', [SiswaController::class, 'naikKelas'])->name('siswa.naik-kelas');

    // Routes untuk admin (manajemen user) - HAPUS MIDDLEWARE ROLE
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});

require __DIR__.'/auth.php';