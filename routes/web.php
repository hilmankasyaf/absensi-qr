<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\SomeController;
use App\Http\Controllers\RoleController; // Tambahkan ini
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (Auth::check()) {
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif (Auth::user()->role === 'user') {
            return redirect()->route('karyawan.dashboard');
        }
    }
    return view('auth.login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/karyawan/dashboard', [KaryawanController::class, 'index'])->name('karyawan.dashboard');
    Route::get('/karyawan/qrcode', [KaryawanController::class, 'qrcode'])->name('karyawan.qrcode');
    Route::get('/karyawan/qrcode/download', [KaryawanController::class, 'qrcodeDownload'])->name('karyawan.qrcode.download');
    Route::post('/karyawan/scan', [KaryawanController::class, 'scan'])->name('karyawan.scan');
});

// Tambahkan rute RoleController
Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
Route::get('/roles/{id}', [RoleController::class, 'show'])->name('roles.show');

// Tambahkan rute SomeController jika diperlukan
Route::get('/some-method', [SomeController::class, 'someMethod']);

require __DIR__.'/auth.php';