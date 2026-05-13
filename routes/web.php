<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\residential_complexes_controler;
use App\Http\Controllers\containers_controller;
use App\Http\Controllers\Bookings_Application;
use GuzzleHttp\Middleware;
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

    Route::get('/profile/bookings', [Bookings_Application::class, 'userBookings'])->name('profile.bookings');
    Route::get('/profile/booking-history', [Bookings_Application::class, 'bookingHistory'])->name('profile.booking-history');
});

Route::get('/complexes', [residential_complexes_controler::class, 'Residential_Complexes_Data'])->name('complexes');
Route::get('/complexes/{id}', [residential_complexes_controler::class, 'Complex_Card_Show'])->name('complex_card');

Route::get('/containers', [containers_controller::class, 'Containers_Data'])->name('containers');
Route::get('/containers/{id}', [containers_controller::class, 'Containers_Show'])->name('container_card');

Route::post('/bookings/store', [Bookings_Application::class, 'Bookings_Form'])->name('bookings.store')->middleware("auth");
Route::delete('/bookings/{id}/cancel', [Bookings_Application::class, 'cancelBooking'])->name('bookings.cancel')->middleware("auth");

require __DIR__.'/auth.php';
