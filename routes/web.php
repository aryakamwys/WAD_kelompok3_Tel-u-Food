<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\OrderController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // User Routes
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    
    // Admin Routes
    Route::middleware(['admin'])->prefix('admin')->group(function () {
        Route::resource('restaurants', RestaurantController::class);
        Route::resource('menus', MenuController::class);
        Route::resource('banners', BannerController::class);
    });
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('orders', OrderController::class);
});
