<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\ProductController;      // Tambahkan import ini
use App\Http\Controllers\TransactionController;  // Tambahkan import ini
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::resource('products', ProductController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {

    // Route pengarah /dashboard utama
    Route::get('/dashboard', function () {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('kasir.dashboard');
    })->name('dashboard');

    // Khusus Admin
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('products', ProductController::class);
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    });

    // Khusus Kasir
    Route::middleware(['role:kasir'])->group(function () {
        Route::resource('products', ProductController::class)->only(['index', 'show']); // Kasir hanya bisa melihat produk
        Route::resource('transactions', TransactionController::class);
        Route::get('/kasir/dashboard', [KasirController::class, 'dashboard'])->name('kasir.dashboard');
    });

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
