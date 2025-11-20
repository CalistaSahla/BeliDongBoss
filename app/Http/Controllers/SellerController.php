<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    // Menampilkan form
    public function create()
    {
        return view('seller.register');
    }

    // Menyimpan data seller
    public function store(Request $request)
    {
        // 1. Validasi
        $validated = $request->validate([
            'store_name'        => 'required|string|max:255',
            'store_description' => 'nullable|string',
            'pic_name'          => 'required|string|max:255',
            'pic_phone'         => 'nullable|string|max:50',
            'pic_email'         => 'nullable|email|max:255',
            'pic_street'        => 'nullable|string',
            'pic_rt'            => 'nullable|string|max:5',
            'pic_rw'            => 'nullable|string|max:5',
            'pic_village'       => 'nullable|string|max:255',
            'pic_city'          => 'nullable|string|max:255',
            'pic_province'      => 'nullable|string|max:255',
            'pic_ktp_number'    => 'nullable|string|max:100',
            'pic_photo'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'pic_ktp'           => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:4096',
        ]);

        // 2. Upload file
        $picPhotoPath = null;
        $picKtpPath = null;

        if ($request->hasFile('pic_photo')) {
            $picPhotoPath = $request->file('pic_photo')->store('seller_photos', 'public');
        }

        if ($request->hasFile('pic_ktp')) {
            $picKtpPath = $request->file('pic_ktp')->store('seller_ktp', 'public');
        }

        // 3. Simpan ke database
        Seller::create([
            'store_name'        => $validated['store_name'],
            'store_description' => $validated['store_description'] ?? null,
            'pic_name'          => $validated['pic_name'],
            'pic_phone'         => $validated['pic_phone'] ?? null,
            'pic_email'         => $validated['pic_email'] ?? null,
            'pic_street'        => $validated['pic_street'] ?? null,
            'pic_rt'            => $validated['pic_rt'] ?? null,
            'pic_rw'            => $validated['pic_rw'] ?? null,
            'pic_village'       => $validated['pic_village'] ?? null,
            'pic_city'          => $validated['pic_city'] ?? null,
            'pic_province'      => $validated['pic_province'] ?? null,
            'pic_ktp_number'    => $validated['pic_ktp_number'] ?? null,
            'pic_photo_path'    => $picPhotoPath,
            'pic_ktp_file_path' => $picKtpPath,
            'status'            => 'PENDING',
        ]);

        return redirect()->back()->with('success', 'Registrasi penjual berhasil!');
    }
}
