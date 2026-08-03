<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
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
Route::post('/register', [AuthController::class, 'customerRegister'])->name('register.submit');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Authentication Routes
Route::get('/admin/login', [AdminAuthController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'adminLogin'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'adminLogout'])->name('admin.logout');

// Protected Admin Routes
Route::middleware([AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('brands', BrandController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('sub-categories', SubCategoryController::class);
    Route::resource('attributes', AttributeController::class);
    Route::resource('products', ProductController::class);
    Route::get('categories/{category}/sub-categories', [ProductController::class, 'getSubCategories'])->name('categories.sub-categories');
});

