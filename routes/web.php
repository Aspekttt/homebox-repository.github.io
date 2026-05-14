<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\residential_complexes_controler;
use App\Http\Controllers\containers_controller;
use App\Http\Controllers\Bookings_Application;
use App\Http\Controllers\Admin_Controller;
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


Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [Admin_Controller::class, 'index'])->name('admin');
    Route::get('/admin/complexes', [Admin_Controller::class, 'complexes'])->name('admin.complexes');
    Route::delete('/admin/complexes/{id}', [Admin_Controller::class, 'complexesDestroy'])->name('admin.complexes.destroy');
    Route::post('/admin/complexes', [Admin_Controller::class, 'complexesStore'])->name('admin.complexes.store');
    Route::put('/admin/complexes/{id}', [Admin_Controller::class, 'complexesUpdate'])->name('admin.complexes.update');

    Route::get('/admin/containers', [Admin_Controller::class, 'containers'])->name('admin.containers');
    Route::delete('/admin/containers/{id}', [Admin_Controller::class, 'containersDestroy'])->name('admin.containers.destroy');
    Route::post('/admin/containers', [Admin_Controller::class, 'containersStore'])->name('admin.containers.store');
    Route::put('/admin/containers/{id}', [Admin_Controller::class, 'containersUpdate'])->name('admin.containers.update');

    Route::get('/admin/bookings', [Admin_Controller::class, 'bookings'])->name('admin.bookings');
    Route::put('/admin/bookings/{id}/status', [Admin_Controller::class, 'bookingsUpdateStatus'])->name('admin.bookings.update-status');

    Route::get('/admin/users', [Admin_Controller::class, 'users'])->name('admin.users');
    Route::post('/admin/users/{id}/role', [Admin_Controller::class, 'Users_Update_Role'])->name('admin.users.role');
});


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
