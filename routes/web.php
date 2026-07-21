<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Middleware\AdminMiddleware;

// Public Front-End Routes
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/shop', function () {
    return view('shop');
})->name('shop');

Route::get('/product-details', function () {
    return view('product-details');
})->name('product.details');

// Customer Authentication Routes
Route::get('/login', [AuthController::class, 'showCustomerLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'customerLogin'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Authentication Routes
Route::get('/admin/login', [AdminAuthController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'adminLogin'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'adminLogout'])->name('admin.logout');

// Protected Admin Routes
Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index']);
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
});
