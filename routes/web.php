<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TableController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

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
        Route::get('/home', [HomeController::class, 'index'])->name('customer.home');;
        Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
        Route::get('/checkout', [OrderController::class, 'checkout'])->name('order.checkout');
        Route::post('/checkout', [OrderController::class, 'store'])->name('order.store');
        // Cart
        Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
        Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
        Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
        Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

    });
});

require __DIR__ . '/auth.php';
