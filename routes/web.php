<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AppointmentController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

/*
|--------------------------------------------------------------------------
| Protected Routes (LOGIN REQUIRED)
|--------------------------------------------------------------------------
*/
Route::middleware('webauth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Booking & Schedule (same page logic if you want)
    Route::get('/booking', [BookingController::class, 'index'])->name('booking');

    Route::get('/schedule-appointment', function () {
        return view('schedule-appointment');
    })->name('schedule-appointment');

    // Cart & Orders
    // Route::view('/cart', 'cart')->name('cart');
     Route::view('/orders', 'orders.index')->name('orders');

    // Payment
    Route::post('/payment/create-order', [PaymentController::class, 'createOrder'])
        ->name('payment.create.order');

    // Appointment
    Route::post('/appointment/store', [AppointmentController::class, 'store'])
        ->name('appointment.store');

    Route::get('/appointment/success', function () {
        return view('appointment-success');
    })->name('appointment.success');
});
