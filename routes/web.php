<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'postRegister']);
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'postLogin']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'index']);
    Route::get('/profile/booking', [UserController::class, 'getBooking']);
    Route::get('/profile/booking/{booking_id}', [UserController::class, 'showBooking']);
    Route::put('/profile/booking/{booking_id}/accept', [UserController::class, 'acceptBooking']);
    Route::put('/profile/booking/{booking_id}/reject', [UserController::class, 'rejectBooking']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/counsellors', [HomeController::class, 'getCounsellor']);
Route::get('/counsellors/{counsellor_id}', [HomeController::class, 'showCounsellor']);

Route::get('/find-counsellor', [HomeController::class, 'search']);
Route::get('/find-result', [HomeController::class, 'result']);

Route::get('/booking/{counsellor_id}', [BookingController::class, 'index'])->name('booking.index');
Route::post('/booking/{counsellor_id}', [BookingController::class, 'store'])->name('booking.store');
Route::get('/check', [BookingController::class, 'getAvailableTime']);
