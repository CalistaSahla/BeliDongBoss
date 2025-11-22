<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Mail\SellerStatusMail;

class SellerVerificationController extends Controller
{
    public function index()
    {
        $sellers = Seller::latest()->get();
        return view('admin.verifikasi-seller.index', compact('sellers'));
    }

    public function approve($id)
    {
        $seller = Seller::findOrFail($id);

        // generate password baru
        $password = Str::random(8);

        // update password user
        $seller->user->password = Hash::make($password);
        $seller->user->save();

        // update status seller
        $seller->status = 'approved';
        $seller->save();

        // kirim email ke seller
        Mail::to($seller->email)->send(
            new SellerStatusMail($seller, 'approved', $password)
        );

        return back()->with('success', 'Seller berhasil disetujui dan password sudah dikirim.');
    }

    public function reject(Request $request, $id)
    {
        $request->validate([
            'reason' => 'required'
        ]);

        $seller = Seller::findOrFail($id);

        // update status
        $seller->status = 'rejected';
        $seller->save();

        // kirim email penolakan
        Mail::to($seller->email)->send(
            new SellerStatusMail($seller, 'rejected', null, $request->reason)
        );

        return back()->with('success', 'Seller berhasil ditolak dan email telah dikirim.');
    }
}
