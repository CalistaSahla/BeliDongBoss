<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| AUTH ROUTES (CUSTOM)
|--------------------------------------------------------------------------
| Kita sengaja kosongkan semua route default Breeze.
| TAPI kita tetap membutuhkan route logout agar header tidak error.
*/

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');
