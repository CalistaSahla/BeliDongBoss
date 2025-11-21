<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            $role = Auth::user()->role;

            $user = Auth::user();
            $user->last_login_at = now();
            $user->save();


            // SELLER masuk ke halaman seller product index (SUDAH ADA)
            if ($role === 'seller') {
                return redirect()->route('seller.product.index');
            }

            // ADMIN masuk ke verifikasi seller (SUDAH ADA)
            if ($role === 'admin') {
                return redirect()->route('admin.dashboard');
            }


            // USER biasa masuk ke katalog (SUDAH ADA)
            return redirect()->route('katalog.index');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }
}
