<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Seller;
use Illuminate\Support\Facades\Hash;

class SellerRegisterController extends Controller
{
    public function create() {
        return view('auth.register-seller');
    }

    public function store(Request $request) {

        // VALIDASI SRS-MartPlace-01
        $request->validate([
            'storeName'        => 'required',
            'storeDescription' => 'required',
            'picName'          => 'required',
            'picPhone'         => 'required',
            'picEmail'         => 'required|email',
            'picStreet'        => 'required',
            'picRT'            => 'required',
            'picRW'            => 'required',
            'picVillage'       => 'required',
            'picCity'          => 'required',
            'picProvince'      => 'required',
            'picKtpNumber'     => 'required',
            'picPhoto'         => 'required|image',
            'picKtpFile'       => 'required|mimes:jpg,jpeg,png,pdf',
        ]);

        // Simpan user seller
        $user = User::create([
            'name'     => $request->picName,
            'email'    => $request->picEmail,
            'password' => Hash::make('seller123'),
            'role'     => 'seller',
        ]);

        // Simpan data seller
        Seller::create([
            'user_id'          => $user->id,
            'storeName'        => $request->storeName,
            'storeDescription' => $request->storeDescription,
            'picName'          => $request->picName,
            'picPhone'         => $request->picPhone,
            'picEmail'         => $request->picEmail,
            'picStreet'        => $request->picStreet,
            'picRT'            => $request->picRT,
            'picRW'            => $request->picRW,
            'picVillage'       => $request->picVillage,
            'picCity'          => $request->picCity,
            'picProvince'      => $request->picProvince,
            'picKtpNumber'     => $request->picKtpNumber,
            'status'           => 'pending',
        ]);

        return redirect()->route('login')->with('success', 'Pendaftaran seller berhasil! Menunggu verifikasi admin.');
    }
}
