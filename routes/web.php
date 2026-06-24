<?php

use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Halaman Awal Sebelum Login
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }

    return view('guest.landing');
})->name('home');

/*
|--------------------------------------------------------------------------
| Pengalihan Setelah Login
|--------------------------------------------------------------------------
|
| Admin diarahkan ke dashboard admin.
| User biasa diarahkan ke dashboard user.
|
*/

Route::get('/dashboard', function () {
    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('user.dashboard');
})->middleware('auth')->name('dashboard');

/*
|--------------------------------------------------------------------------
| Profile User dan Admin
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Halaman Khusus User / Pembeli Tiket
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/user/dashboard', [HomeController::class, 'dashboard'])
        ->name('user.dashboard');

    Route::get('/countries/{country:slug}', [HomeController::class, 'country'])
        ->name('countries.show');

    Route::get('/destinations/{destination:slug}', [HomeController::class, 'destination'])
        ->name('destinations.show');

    Route::get('/my-bookings', [BookingController::class, 'index'])
        ->name('bookings.index');

    Route::get('/destinations/{destination:slug}/booking', [BookingController::class, 'create'])
        ->name('bookings.create');

    Route::post('/destinations/{destination:slug}/booking', [BookingController::class, 'store'])
        ->name('bookings.store');

    Route::get('/my-bookings/{booking}', [BookingController::class, 'show'])
        ->name('bookings.show');

    Route::get('/my-bookings/{booking}/payment', [PaymentController::class, 'create'])
        ->name('payments.create');

    Route::post('/my-bookings/{booking}/payment', [PaymentController::class, 'store'])
        ->name('payments.store');

    Route::get('/my-bookings/{booking}/ticket', [PaymentController::class, 'success'])
        ->name('payments.success');
});

/*
|--------------------------------------------------------------------------
| Halaman Khusus Admin
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('countries', CountryController::class)->except('show');

        Route::resource('destinations', DestinationController::class)->except('show');

        Route::resource('bookings', AdminBookingController::class)
            ->only(['index', 'show']);
    });

/*
|--------------------------------------------------------------------------
| Autentikasi Breeze
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';