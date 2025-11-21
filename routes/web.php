<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SellerRegisterController;

use App\Http\Controllers\Admin\SellerVerificationController;
use App\Http\Controllers\Seller\ProductController;

use App\Http\Controllers\ReviewController;
// ==========================
// AUTH USER
// ==========================

// REGISTER USER
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.process');

// LOGIN USER
Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.process');


// ==========================
// REGISTER SELLER (SRS ONLY)
// ==========================
Route::get('/register/seller', [SellerRegisterController::class, 'create'])->name('seller.register');
Route::post('/register/seller', [SellerRegisterController::class, 'store'])->name('seller.register.process');


// ==========================
// HOME DEFAULT
// ==========================
Route::get('/', function () {
    return view('welcome');
});


// ==========================
// DASHBOARD
// ==========================
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


// ==========================
// PROFILE (Laravel Default)
// ==========================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// ==========================
// KATALOG
// ==========================

Route::get('/katalog', function () {
    return view('katalog.index');
})->name('katalog.index');

// ==========================
// SELLER
// ==========================


Route::middleware(['auth'])->group(function () {

    // Halaman list seller pending
    Route::get('/admin/verifikasi-seller', [SellerVerificationController::class, 'index'])
        ->name('admin.verifikasi.seller');

    // Approve
    Route::post('/admin/verifikasi-seller/{id}/approve', [SellerVerificationController::class, 'approve'])
        ->name('admin.verifikasi.seller.approve');

    // Reject
    Route::post('/admin/verifikasi-seller/{id}/reject', [SellerVerificationController::class, 'reject'])
        ->name('admin.verifikasi.seller.reject');
});

// ==========================
// SELLER UPLOAD PRODUK
// ==========================


Route::middleware(['auth'])->group(function () {

    Route::get('/seller/produk', [ProductController::class, 'index'])
        ->name('seller.product.index');

    Route::get('/seller/produk/create', [ProductController::class, 'create'])
        ->name('seller.product.create');

    Route::post('/seller/produk', [ProductController::class, 'store'])
        ->name('seller.product.store');

    Route::get('/katalog', [ProductController::class, 'index'])
        ->name('katalog.index');
    
    Route::get('/produk/{id}', [ProductController::class, 'show'])
        ->name('produk.detail');

// ==========================
// DETAI PRODUK
// ==========================
    Route::get('/produk/{id}', [ProductController::class, 'show'])
        ->name('produk.detail');

});

// ==========================
// REVIEW PRODUK
// ==========================   
Route::middleware('auth')->group(function () {
    Route::post('/produk/{id}/review', [ReviewController::class, 'store'])
        ->name('produk.review.store');
});

