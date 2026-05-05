<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name("/");

Route::get('/about', function () {
    return view('about');
})->name("about");

Route::get('/complexes', function () {
    return view('complexes');
})->name("complexes");

Route::get('/containers', function () {
    return view('containers');
})->name("containers");



Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/profile/bookings', [ProfileController::class, 'bookings'])->name('profile.bookings');
    Route::get('/profile/booking-history', [ProfileController::class, 'booking_history'])->name('profile.booking-history');
});

require __DIR__.'/auth.php';
