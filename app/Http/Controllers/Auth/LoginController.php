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

            $user = Auth::user();

            $user->last_login_at = now();
            $user->save();

            // SELLER
            if ($user->role === 'seller') {
                return redirect()->route('seller.dashboard');
            }

            // ADMIN
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            // USER BIASA
            return redirect()->route('dashboard');
         }

    }
}