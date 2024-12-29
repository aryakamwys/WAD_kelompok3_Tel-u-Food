<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\BeverageController;

// Public routes
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/explore/restaurants', [PublicController::class, 'restaurants'])->name('restaurants.explore');
Route::get('/explore/restaurants/{restaurant}', [PublicController::class, 'restaurantDetail'])->name('explore.restaurants.show');
Route::get('/explore/menus', [PublicController::class, 'menus'])->name('menus.explore');

// Admin routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [PublicController::class, 'home'])->name('dashboard');
    Route::get('/dashboard', [PublicController::class, 'home'])->name('home');
    Route::resource('banners', BannerController::class);
    Route::resource('restaurants', RestaurantController::class);

    Route::get('/foods', [FoodController::class, 'index'])->name('foods.index');
    Route::get('/foods/create', [FoodController::class, 'create'])->name('foods.create');
    Route::post('/foods', [FoodController::class, 'store'])->name('foods.store');
    Route::get('/foods/{menu}/edit', [FoodController::class, 'edit'])->name('foods.edit');
    Route::put('/foods/{menu}', [FoodController::class, 'update'])->name('foods.update');
    Route::delete('/foods/{menu}', [FoodController::class, 'destroy'])->name('foods.destroy');

    Route::get('/beverages', [BeverageController::class, 'index'])->name('beverages.index');
    Route::get('/beverages/create', [BeverageController::class, 'create'])->name('beverages.create');
    Route::post('/beverages', [BeverageController::class, 'store'])->name('beverages.store');
    Route::get('/beverages/{menu}/edit', [BeverageController::class, 'edit'])->name('beverages.edit');
    Route::put('/beverages/{menu}', [BeverageController::class, 'update'])->name('beverages.update');
    Route::delete('/beverages/{menu}', [BeverageController::class, 'destroy'])->name('beverages.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
