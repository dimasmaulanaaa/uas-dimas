<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\PropinsiController;
use App\Http\Controllers\KotaController;

// Routes untuk non-autentikasi
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    } else {
        return redirect()->route('login');
    }
});

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard Route
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Route::group untuk melindungi rute yang memerlukan otentikasi
Route::group(['middleware' => 'auth'], function () {
// Rute-rute CRUD Penduduk
Route::get('/penduduk', [PendudukController::class, 'index'])->name('penduduk.index');
Route::get('/penduduk/create', [PendudukController::class, 'create'])->name('penduduk.create');
Route::post('/penduduk', [PendudukController::class, 'store'])->name('penduduk.store');
Route::get('/penduduk/{penduduk}/edit', [PendudukController::class, 'edit'])->name('penduduk.edit');
Route::put('/penduduk/{penduduk}', [PendudukController::class, 'update'])->name('penduduk.update');
Route::delete('/penduduk/{penduduk}', [PendudukController::class, 'destroy'])->name('penduduk.destroy');

// Rute-rute CRUD Propinsi
Route::get('/propinsi', [PropinsiController::class, 'index'])->name('propinsi.index');
Route::get('/propinsi/create', [PropinsiController::class, 'create'])->name('propinsi.create');
Route::post('/propinsi', [PropinsiController::class, 'store'])->name('propinsi.store');
Route::get('/propinsi/{propinsi}/edit', [PropinsiController::class, 'edit'])->name('propinsi.edit');
Route::put('/propinsi/{propinsi}', [PropinsiController::class, 'update'])->name('propinsi.update');
Route::delete('/propinsi/{propinsi}', [PropinsiController::class, 'destroy'])->name('propinsi.destroy');

// Rute-rute CRUD Kota
Route::get('/kota', [KotaController::class, 'index'])->name('kota.index');
Route::get('/kota/create', [KotaController::class, 'create'])->name('kota.create');
Route::post('/kota', [KotaController::class, 'store'])->name('kota.store');
Route::get('/kota/{kota}/edit', [KotaController::class, 'edit'])->name('kota.edit');
Route::put('/kota/{kota}', [KotaController::class, 'update'])->name('kota.update');
Route::delete('/kota/{kota}', [KotaController::class, 'destroy'])->name('kota.destroy');
});


// // Penduduk Routes
// Route::get('/penduduk', [PendudukController::class, 'index'])->name('penduduk.index');
// Route::get('/penduduk/create', [PendudukController::class, 'create'])->name('penduduk.create');
// Route::post('/penduduk', [PendudukController::class, 'store'])->name('penduduk.store');
// Route::get('/penduduk/{id}/edit', [PendudukController::class, 'edit'])->name('penduduk.edit');
// Route::put('/penduduk/{id}', [PendudukController::class, 'update'])->name('penduduk.update');
// Route::delete('/penduduk/{id}', [PendudukController::class, 'destroy'])->name('penduduk.destroy');


// // Propinsi Routes
// Route::get('/propinsi', [PropinsiController::class, 'index'])->name('propinsi.index')->middleware('auth');
// Route::get('/propinsi/create', [PropinsiController::class, 'create'])->name('propinsi.create')->middleware('auth');
// Route::post('/propinsi', [PropinsiController::class, 'store'])->name('propinsi.store')->middleware('auth');
// Route::get('/propinsi/{id}/edit', [PropinsiController::class, 'edit'])->name('propinsi.edit')->middleware('auth');
// Route::put('/propinsi/{id}', [PropinsiController::class, 'update'])->name('propinsi.update')->middleware('auth');
// Route::delete('/propinsi/{id}', [PropinsiController::class, 'destroy'])->name('propinsi.destroy')->middleware('auth');

// // Kota Routes
// Route::get('/kota', [KotaController::class, 'index'])->name('kota.index')->middleware('auth');
// Route::get('/kota/create', [KotaController::class, 'create'])->name('kota.create')->middleware('auth');
// Route::post('/kota', [KotaController::class, 'store'])->name('kota.store')->middleware('auth');
// Route::get('/kota/{id}/edit', [KotaController::class, 'edit'])->name('kota.edit')->middleware('auth');
// Route::put('/kota/{id}', [KotaController::class, 'update'])->name('kota.update')->middleware('auth');
// Route::delete('/kota/{id}', [KotaController::class, 'destroy'])->name('kota.destroy')->middleware('auth');
