<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('welcome');
});

//login and logout routes

Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('showLoginForm');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');





Route::get('/products', [ProductController::class, 'showmainpage'])->name('product.showmainpage');
Route::get('/index', [ProductController::class, 'showProductsindex'])->name('product.showindex');
Route::match(['get','post'], '/product/filter', [ProductController::class, 'showProdcutfilter'])->name('product.filter');
Route::get('/productdetail/{id}', [ProductController::class, 'showProductdetail'])->name('product.detail');

// مسارات السلة
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'updateCart'])->name('cart.update');
Route::get('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');


    Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('/products/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
    Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/products/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::post('/product', [ProductController::class, 'store'])->name('product.store');
    Route::get('/add', [ProductController::class, 'showAddForm'])->name('admin.add');
    Route::get('/products', [ProductController::class, 'showAdmin'])->name('product.showAdmin');


    Route::get('/orders', [OrderController::class, 'index'])->name('order.index');
    Route::get('/orders/edit/{id}', [OrderController::class, 'edit'])->name('order.edit');
    Route::post('/orders/update/{id}', [OrderController::class, 'update'])->name('order.update');
    Route::get('/orders/delete/{id}', [OrderController::class, 'destroy'])->name('order.delete');
    Route::post('/orders/update-status/{id}', [OrderController::class, 'updateStatus'])->name('order.updateStatus');


});


Route::get('/order/create', [OrderController::class, 'create'])->name('order.create');
Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');
/*
|--------------------------------------------------------------------------
| Web Routes


// الصفحة الرئيسية
Route::get('/', [ProductController::class, 'showProdcutsindex'])->name('product.showindex');
// صفحة المنتجات
Route::get('/products', [ProductController::class, 'showmainpage'])->name('product.showmainpage');

// مسارات السلة
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'updateCart'])->name('cart.update');
Route::get('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

// مسارات الطلبات
Route::get('/order/create', [OrderController::class, 'create'])->name('order.create');
Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');
Route::get('/product/{id}', [ProductController::class, 'showProductdetail'])->name('product.detail');

// مسارات لوحة الإدارة
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('order.index');
    Route::get('/orders/edit/{id}', [OrderController::class, 'edit'])->name('order.edit');
    Route::post('/orders/update/{id}', [OrderController::class, 'update'])->name('order.update');
    Route::delete('/orders/delete/{id}', [OrderController::class, 'destroy'])->name('order.destroy');
    Route::post('/orders/update-status/{id}', [OrderController::class, 'updateStatus'])->name('order.updateStatus');

    // مسارات إدارة المنتجات
    Route::get('/products', [ProductController::class, 'showProductsAdmin'])->name('product.showProductsAdmin');
    Route::get('/products/create', [ProductController::class, 'showAddForm'])->name('product.create');
    Route::post('/products', [ProductController::class, 'store'])->name('product.store');
    Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/products/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/products/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
});

// مسارات تسجيل الدخول والخروج
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('showLoginForm');
Route::post('/login', [LoginController::class, 'login'])->name('admin.login');
Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');

|--------------------------------------------------------------------------
*/