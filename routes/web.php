<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TableController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Tidak boleh memilih meja kalau sudah punya
    Route::middleware(['table.locked'])->group(function () {
        Route::get('/pilih-meja', [TableController::class, 'index'])->name('tables.index');
        Route::post('/pilih-meja', [TableController::class, 'choose'])->name('tables.choose');
    });

    // Hanya boleh akses menu setelah pilih meja
    Route::middleware(['table.selected'])->group(function () {
        Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
        Route::post('/checkout', [OrderController::class, 'checkout'])->name('order.checkout');
    });
});

require __DIR__ . '/auth.php';
