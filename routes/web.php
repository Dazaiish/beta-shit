<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SupportTicketController;
use App\Http\Controllers\AdminController;

// --- Frontend routes ---
Route::get('/', function () {
    return view('pages.beranda');
});

Route::get('/filter', function () {
    return view('pages.filter');
});

Route::get('/discount', function () {
    return view('pages.discount');
});

Route::get('/register', function () {
    return view('pages.register');
});

Route::get('/login', function () {
    return view('pages.login');
});

Route::get('/paymentmethod', function () {
    return view('pages.paymentmethod');
});

Route::get('/paymentsection', function () {
    return view('pages.paymentsection');
});

// --- Backend routes ---
// Auth
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::post('/profile/update', [AuthController::class, 'updateProfile']);

// Cars
Route::get('/cars', [CarController::class, 'index']);
Route::get('/cars/{id}', [CarController::class, 'show']);
Route::get('/cars/filter', [CarController::class, 'filter']);

// Bookings
Route::post('/bookings', [BookingController::class, 'store']);
Route::put('/bookings/{id}', [BookingController::class, 'update']);
Route::delete('/bookings/{id}', [BookingController::class, 'cancel']);

// Payments
Route::post('/payments', [PaymentController::class, 'store']);
Route::get('/payments/{id}', [PaymentController::class, 'show']);
Route::get('/payments/{id}/receipt', [PaymentController::class, 'receipt']);

// Notifications
Route::get('/notifications', [NotificationController::class, 'index']);
Route::post('/notifications/{id}/read', [NotificationController::class, 'markAsRead']);

// Support Tickets
Route::post('/support-tickets', [SupportTicketController::class, 'store']);
Route::get('/support-tickets', [SupportTicketController::class, 'index']);
Route::put('/support-tickets/{id}', [SupportTicketController::class, 'update']);
Route::post('/support-tickets/{id}/resolve', [SupportTicketController::class, 'resolve']);

// Admin
Route::get('/admin/users', [AdminController::class, 'manageUsers']);
Route::get('/admin/cars', [AdminController::class, 'manageCars']);
Route::get('/admin/logs', [AdminController::class, 'logActions']);
