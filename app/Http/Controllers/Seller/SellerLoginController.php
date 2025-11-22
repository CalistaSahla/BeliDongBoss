<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Seller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SellerLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('seller.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $seller = Seller::where('email', $request->email)->first();

        // Jika seller tidak ditemukan atau password salah → beri pesan umum
        if (!$seller || !Hash::check($request->password, $seller->password)) {
            return back()->with('error', 'Email atau password salah.');
        }

        // Jika akun masih pending
        if ($seller->status === 'pending') {
            return back()->with('error', 'Akun Anda sedang menunggu verifikasi admin.');
        }

        // Jika ditolak
        if ($seller->status === 'rejected') {
            return back()->with('error', 'Pendaftaran Anda ditolak oleh admin.');
        }

        // Login seller
        auth()->login($seller->user);
        return redirect()->route('seller.dashboard')
            ->with('success', 'Berhasil masuk.');
    }

 }
