<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB; // penting
use App\Mail\SellerRegisteredMail;

class SellerRegisterController extends Controller
{
    public function create()
    {
        return view('seller.register');
    }

    public function store(Request $request)
    {
        // ================================
        // VALIDASI
        // ================================
        $request->validate([
            'store_name'   => 'required|string|max:255',
            'pic_name'     => 'required|string|max:255',
            'email'        => 'required|email|unique:users,email|unique:sellers,email',
            'phone'        => 'required|string|max:20',
            'province'     => 'required|string|max:255',
            'city'         => 'required|string|max:255',
            'address'      => 'required|string|max:500',
            'pic_photo'    => 'required|image|mimes:jpg,jpeg,png|max:3072',
            'ktp_photo'    => 'required|image|mimes:jpg,jpeg,png|max:3072',
        ]);

        // ================================
        // DATABASE TRANSACTION
        // agar tidak setengah-setengah
        // ================================
        DB::beginTransaction();

        try {

            // 1. BUAT USER OTOMATIS
            $randomPassword = Str::random(12);

            $user = User::create([
                'name'     => $request->store_name,
                'email'    => $request->email,
                'password' => Hash::make($randomPassword),
                'role'     => 'seller',
            ]);

            // 2. SIMPAN FOTO
            $pic = $request->file('pic_photo')->store('seller/pic', 'public');
            $ktp = $request->file('ktp_photo')->store('seller/ktp', 'public');

            // 3. SAVE SELLER
            $seller = Seller::create([
                'user_id'    => $user->id,
                'store_name' => $request->store_name,
                'pic_name'   => $request->pic_name,
                'email'      => $request->email,
                'phone'      => $request->phone,
                'province'   => $request->province,
                'city'       => $request->city,
                'address'    => $request->address,
                'pic_photo'  => $pic,
                'ktp_photo'  => $ktp,
                'status'     => 'pending',
            ]);

            // 4. NOTIFIKASI EMAIL KE ADMIN
            Mail::to('admin@belidongbos.test')->send(
                new SellerRegisteredMail($seller)
            );

            DB::commit();

        } catch (\Exception $e) {

            DB::rollBack();

            return back()
                ->withErrors(['error' => 'Terjadi kesalahan server.'])
                ->withInput();
        }

        // 5. REDIRECT
        return redirect()
            ->route('seller.login')
            ->with('success', 'Pendaftaran berhasil! Akun Anda sedang menunggu verifikasi admin.');
    }
}
