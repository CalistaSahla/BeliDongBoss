<?php

use Illuminate\Support\Facades\Route;


// PROFILE
use App\Http\Controllers\ProfileController;

// SELLER
use App\Http\Controllers\Seller\ProductController as SellerProductController;
use App\Http\Controllers\Seller\SellerDashboardController;
use App\Http\Controllers\Seller\SellerRegisterController;
use App\Http\Controllers\Seller\SellerLoginController;
// USER KATALOG
use App\Http\Controllers\ProductController;;

// ADMIN
use App\Http\Controllers\Admin\SellerVerificationController;
use App\Http\Controllers\Admin\AdminDashboardController;

// REVIEW
use App\Http\Controllers\ReviewController;

//Mail
use App\Mail\SellerRegisteredMail;
use Illuminate\Support\Facades\Mail;

// KATALOG
use App\Http\Controllers\KatalogProductController;

Route::get('/katalog', [KatalogProductController::class, 'index'])->name('katalog.index');



// ==========================
// HOME
// ==========================

Route::get('/', [ProductController::class, 'index'])->name('home');


// ==========================
// REGISTER SELLER
// ==========================


Route::get('/register/seller', [SellerRegisterController::class, 'create'])
    ->name('seller.register');

Route::post('/register/seller', [SellerRegisterController::class, 'store'])
    ->name('seller.register.process');

Route::get('/seller/login', [SellerLoginController::class, 'showLoginForm'])
    ->name('seller.login');

Route::post('/seller/login', [SellerLoginController::class, 'login'])
    ->name('seller.login.process');


// ==========================
// DASHBOARD
// ==========================
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // PROFILE
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// ==========================
// KATALOG (USER PUBLIC)
// ==========================
Route::get('/katalog', [KatalogProductController::class, 'index'])->name('katalog.index');
Route::get('/produk/{id}', [KatalogProductController::class, 'show'])->name('produk.detail');


// ==========================
// SELLER PRODUCT PANEL
// ==========================
Route::middleware(['auth'])->group(function () {

    Route::get('/seller/produk', [SellerProductController::class, 'index'])
        ->name('seller.product.index');

    Route::get('/seller/produk/create', [SellerProductController::class, 'create'])
        ->name('seller.product.create');

    Route::post('/seller/produk', [SellerProductController::class, 'store'])
        ->name('seller.product.store');
});


// ==========================
// ADMIN — VERIFIKASI SELLER
// ==========================
Route::middleware('auth')->group(function () {

    Route::get('/admin/verifikasi-seller', [SellerVerificationController::class, 'index'])
        ->name('admin.verifikasi.seller');

    Route::post('/admin/verifikasi-seller/{id}/approve', [SellerVerificationController::class, 'approve'])
        ->name('admin.verifikasi.seller.approve');

    Route::post('/admin/verifikasi-seller/{id}/reject', [SellerVerificationController::class, 'reject'])
        ->name('admin.verifikasi.seller.reject');

    // Dashboard Admin
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');
});


// ==========================
// REVIEW PRODUK
// ==========================
Route::middleware('auth')->group(function () {
    Route::post('/produk/{id}/review', [ReviewController::class, 'store'])
        ->name('produk.review.store');
});
