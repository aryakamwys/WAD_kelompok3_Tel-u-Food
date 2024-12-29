<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MakananController;
use App\Http\Controllers\StoreController;

// Routing untuk Store
Route::resource('stores', StoreController::class);

// Routing untuk Makanan yang terhubung dengan Store
Route::resource('stores.makanan', MakananController::class);  // Routing untuk makanan terkait store



Route::resource('makanan', MakananController::class);


Route::get('/', Controllers\HomeController::class)->name('home');

Route::get('/dashboard', Controllers\DashboardController::class)->middleware(['auth', 'verified'])->name('dashboard');


Route::resource('stores', Controllers\StoreController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
