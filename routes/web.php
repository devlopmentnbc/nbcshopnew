<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\FeaturedProductController;
use App\Http\Middleware\AdminMiddleware;
use App\Models\Banner;
use App\Models\Product;
use App\Http\Controllers\WishlistController;

// Public Front-End Routes
Route::get('/', function () {
    $banners = Banner::where('status', true)->orderBy('sort_order', 'asc')->latest()->get();
    $bestSellers = Product::with(['brand', 'category', 'attributeValues'])
        ->where('status', true)
        ->where('is_best_seller', true)
        ->take(6)
        ->latest()
        ->get();

    $newArrivals = Product::with(['brand', 'category', 'attributeValues'])
        ->where('status', true)
        ->where('is_new_arrival', true)
        ->take(6)
        ->latest()
        ->get();

    return view('home', compact('banners', 'bestSellers', 'newArrivals'));
})->name('home');

use App\Http\Controllers\ShopController;

Route::get('/shop', [ShopController::class, 'index'])->name('shop');

Route::get('/product-details/{slug?}', function ($slug = null) {
    $identifier = $slug ?? request()->query('slug') ?? request()->query('id');
    $product = null;

    if ($identifier) {
        $product = Product::with(['brand', 'category', 'subCategory', 'attributeValues.attribute', 'images'])
            ->where(function ($query) use ($identifier) {
                $query->where('slug', $identifier);
                if (is_numeric($identifier)) {
                    $query->orWhere('id', (int) $identifier);
                }
            })
            ->first();
    }

    if (!$product) {
        $product = Product::with(['brand', 'category', 'subCategory', 'attributeValues.attribute', 'images'])
            ->where('status', true)
            ->latest()
            ->first();
    }

    return view('product-details', compact('product'));
})->name('product.details');

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

// Public Cart Routes (7-Day Session Cart)
Route::get('/cart/items', [CartController::class, 'getCart'])->name('cart.items');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

use App\Http\Controllers\Payments\CybersourceController;

// CyberSource Callback & Payment Routes
Route::get('/payments/cybersource/pay/{orderNumber}', [CybersourceController::class, 'pay'])->name('payments.cybersource.pay');
Route::post('/payments/cybersource/response', [CybersourceController::class, 'handleResponse'])->name('payments.cybersource.response');

// Checkout Routes (guest checkout allowed)
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::post('/checkout/calculate-shipping', [CheckoutController::class, 'calculateShipping'])->name('checkout.calculate_shipping');
Route::get('/checkout/success/{orderNumber}', [CheckoutController::class, 'success'])->name('checkout.success');

// Customer Authentication Routes
Route::get('/login', [AuthController::class, 'showCustomerLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'customerLogin'])->name('login.submit');
Route::post('/register', [AuthController::class, 'customerRegister'])->name('register.submit');
Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('auth.google.callback');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [AuthController::class, 'showProfile'])->name('profile');
    Route::post('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Wishlist Routes
Route::get('/wishlist/items', [WishlistController::class, 'getItems'])->name('wishlist.items');
Route::post('/wishlist/toggle', [WishlistController::class, 'toggle'])->name('wishlist.toggle');

// Admin Authentication Routes
Route::get('/admin/login', [AdminAuthController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'adminLogin'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'adminLogout'])->name('admin.logout');

use App\Http\Controllers\Admin\ShippingSettingController;

// Protected Admin Routes
Route::middleware([AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('brands', BrandController::class);
    Route::resource('banners', BannerController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('sub-categories', SubCategoryController::class);
    Route::resource('attributes', AttributeController::class);
    Route::resource('products', ProductController::class);
    Route::resource('promotions', PromotionController::class)->except('show');
    Route::get('categories/{category}/sub-categories', [ProductController::class, 'getSubCategories'])->name('categories.sub-categories');
    Route::delete('product-images/{image}', [ProductController::class, 'destroyGalleryImage'])->name('products.gallery.destroy');

    // Shipping Settings (Sri Lanka domestic rate & free shipping threshold)
    Route::get('settings/shipping', [ShippingSettingController::class, 'index'])->name('settings.shipping.index');
    Route::post('settings/shipping', [ShippingSettingController::class, 'update'])->name('settings.shipping.update');

    // Featured Products (Best Sellers & New Arrivals)
    Route::get('featured/best-sellers', [FeaturedProductController::class, 'bestSellers'])->name('featured.best-sellers');
    Route::post('featured/best-sellers/add', [FeaturedProductController::class, 'addBestSeller'])->name('featured.best-sellers.add');
    Route::delete('featured/best-sellers/{product}', [FeaturedProductController::class, 'removeBestSeller'])->name('featured.best-sellers.remove');

    Route::get('featured/new-arrivals', [FeaturedProductController::class, 'newArrivals'])->name('featured.new-arrivals');
    Route::post('featured/new-arrivals/add', [FeaturedProductController::class, 'addNewArrival'])->name('featured.new-arrivals.add');
    Route::delete('featured/new-arrivals/{product}', [FeaturedProductController::class, 'removeNewArrival'])->name('featured.new-arrivals.remove');
});
