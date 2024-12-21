<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Customer\DashboardController as CustomerDashboardController;

use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\Pages\ShopController;
use App\Http\Controllers\Pages\WishlistController;

use App\Http\Controllers\Admin\{
    UserController as AdminUserController,
    AdminController as AdminAdminController,
    CategoryController as AdminCategoryController,
    ProductController as AdminProductController,
    OrderController as AdminOrderController,
    OrderItemController as AdminOrderItemController,
    ReviewController as AdminReviewController,
    ImageController as AdminImageController,
    CartController as AdminCartController,
    CartItemController as AdminCartItemController,
    CouponController as AdminCouponController,
    PaymentController as AdminPaymentController
};

use App\Http\Controllers\Customer\{
    UserController as CustomerUserController,
    AdminController as CustomerAdminController,
    CategoryController as CustomerCategoryController,
    ProductController as CustomerProductController,
    OrderController as CustomerOrderController,
    OrderItemController as CustomerOrderItemController,
    ReviewController as CustomerReviewController,
    ImageController as CustomerImageController,
    CartController as CustomerCartController,
    CartItemController as CustomerCartItemController,
    CouponController as CustomerCouponController,
    PaymentController as CustomerPaymentController
};

Route::get('/shop', [ShopController::class, 'getProductsByCategory']);
// تعديل الراوت ليتوجه إلى دالة newestProduct في HomeController
Route::get('/', [HomeController::class, 'newestProduct']);

Route::post('/wishlist/add', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');

use App\Http\Controllers\Pages\CartController;

Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');






// Route::get('/shop', function () {
//     return view('shop');
// });

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/single-product', function () {
    return view('single-product');
});

Route::get('/thanks', function () {
    return view('thanks');
});

Route::get('/wishlist', function () {
    return view('wishlist');
});



// Admin routes
    Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::resource('users', AdminUserController::class);
    Route::post('users/{id}/soft-delete', [AdminUserController::class, 'softDelete'])->name('users.softDelete');
    Route::post('users/{id}/restore', [AdminUserController::class, 'restore'])->name('users.restore');

    Route::resource('admins', AdminAdminController::class);
    Route::post('admins/{id}/soft-delete', [AdminAdminController::class, 'softDelete'])->name('admins.softDelete');
    Route::post('admins/{id}/restore', [AdminAdminController::class, 'restore'])->name('admins.restore');

    Route::resource('categories', AdminCategoryController::class);
    Route::post('categories/{id}/soft-delete', [AdminCategoryController::class, 'softDelete'])->name('categories.softDelete');
    Route::post('categories/{id}/restore', [AdminCategoryController::class, 'restore'])->name('categories.restore');
    Route::post('categories/{id}', [AdminCategoryController::class, 'update'])->name('admin.categories.update');

    Route::resource('products', AdminProductController::class);
    Route::post('products/{id}/soft-delete', [AdminProductController::class, 'softDelete'])->name('products.softDelete');
    Route::post('products/{id}/restore', [AdminProductController::class, 'restore'])->name('products.restore');
    Route::post('products/{id}', [AdminProductController::class, 'update'])->name('admin.products.update');

    Route::resource('orders', AdminOrderController::class);
    Route::post('orders/{id}/soft-delete', [AdminOrderController::class, 'softDelete'])->name('orders.softDelete');
    Route::post('orders/{id}/restore', [AdminOrderController::class, 'restore'])->name('orders.restore');

    Route::resource('order_items', AdminOrderItemController::class);
    Route::post('order_items/{id}/soft-delete', [AdminOrderItemController::class, 'softDelete'])->name('order_items.softDelete');
    Route::post('order_items/{id}/restore', [AdminOrderItemController::class, 'restore'])->name('order_items.restore');

    Route::resource('reviews', AdminReviewController::class);
    Route::post('reviews/{id}/soft-delete', [AdminReviewController::class, 'softDelete'])->name('reviews.softDelete');
    Route::post('reviews/{id}/restore', [AdminReviewController::class, 'restore'])->name('reviews.restore');

    Route::resource('images', AdminImageController::class);
    Route::post('images/{id}/soft-delete', [AdminImageController::class, 'softDelete'])->name('images.softDelete');
    Route::post('images/{id}/restore', [AdminImageController::class, 'restore'])->name('images.restore');
    Route::put('images/{id}', [AdminImageController::class, 'update'])->name('images.update');
    Route::post('/admin/images', [AdminImageController::class, 'store'])->name('images.store');

    Route::resource('carts', AdminCartController::class);
    Route::post('carts/{id}/soft-delete', [AdminCartController::class, 'softDelete'])->name('carts.softDelete');
    Route::post('carts/{id}/restore', [AdminCartController::class, 'restore'])->name('carts.restore');

    Route::resource('cart_items', AdminCartItemController::class);
    Route::post('/cart-items/{id}/soft-delete', [AdminCartItemController::class, 'softDelete'])->name('cart_items.softDelete');
    Route::post('cart_items/{id}/restore', [AdminCartItemController::class, 'restore'])->name('cart_items.restore');

    Route::resource('coupons', AdminCouponController::class);
    Route::post('/coupons/{id}/soft-delete', [AdminCouponController::class, 'softDelete'])->name('coupons.softDelete');
    Route::post('coupons/{id}/restore', [AdminCouponController::class, 'restore'])->name('coupons.restore');
    Route::put('coupons/{id}', [AdminCouponController::class, 'update'])->name('coupons.update');

    Route::resource('payments', AdminPaymentController::class);
    Route::post('payments/{id}/soft-delete', [AdminPaymentController::class, 'softDelete'])->name('payments.softDelete');
    Route::post('payments/{id}/restore', [AdminPaymentController::class, 'restore'])->name('payments.restore');
});

// Customer routes
// Customer routes
Route::middleware(['auth', 'role:customer'])->prefix('customer')->name('customer.')->group(function () {
    Route::get('/dashboard', [CustomerDashboardController::class, 'index'])->name('dashboard');

    // Users Section
    Route::resource('users', CustomerUserController::class);  
    Route::post('users/{id}/soft-delete', [CustomerUserController::class, 'softDelete'])->name('users.softDelete');
    Route::post('users/{id}/restore', [CustomerUserController::class, 'restore'])->name('users.restore');
    
    // Products Section
    Route::resource('products', CustomerProductController::class);
    Route::post('products/{id}/soft-delete', [CustomerProductController::class, 'softDelete'])->name('products.softDelete');
    Route::post('products/{id}/restore', [CustomerProductController::class, 'restore'])->name('products.restore');
    Route::post('products/{id}', [CustomerProductController::class, 'update'])->name('products.update');

    
    // Orders Section
    Route::resource('orders', CustomerOrderController::class);  
    Route::post('orders/{id}/soft-delete', [CustomerOrderController::class, 'softDelete'])->name('orders.softDelete');
    Route::post('orders/{id}/restore', [CustomerOrderController::class, 'restore'])->name('orders.restore');
    // Order Items Section
    Route::resource('order_items', CustomerOrderItemController::class);
    Route::post('order_items/{id}/soft-delete', [CustomerOrderItemController::class, 'softDelete'])->name('order_items.softDelete');
    Route::post('order_items/{id}/restore', [CustomerOrderItemController::class, 'restore'])->name('order_items.restore');
    // Reviews Section
    Route::resource('reviews', CustomerReviewController::class);
    Route::post('reviews/{id}/soft-delete', [CustomerReviewController::class, 'softDelete'])->name('reviews.softDelete');

    // Cart Section
    Route::resource('carts', CustomerCartController::class);
    Route::post('carts/{id}/soft-delete', [CustomerCartController::class, 'softDelete'])->name('carts.softDelete');
    Route::post('carts/{id}/restore', [CustomerCartController::class, 'restore'])->name('carts.restore');

    // Cart Items Section
    Route::resource('cart_items', CustomerCartItemController::class);
    Route::post('cart_items/{id}/soft-delete', [CustomerCartItemController::class, 'softDelete'])->name('cart_items.softDelete');
    Route::post('cart_items/{id}/restore', [CustomerCartItemController::class, 'restore'])->name('cart_items.restore');

    // Payments Section
    Route::resource('payments', CustomerPaymentController::class);
    Route::post('payments/{id}/soft-delete', [CustomerPaymentController::class, 'softDelete'])->name('payments.softDelete');
    Route::post('payments/{id}/restore', [CustomerPaymentController::class, 'restore'])->name('payments.restore');

});


// Shared dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Authentication routes
require __DIR__ . '/auth.php';
