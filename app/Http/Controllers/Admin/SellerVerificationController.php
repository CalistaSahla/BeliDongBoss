<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;

class SellerVerificationController extends Controller
{
    public function index() {
        $pendingSellers = Seller::where('status', 'pending')->get();
        return view('admin.verifikasi-seller', compact('pendingSellers'));
    }

    public function approve($id) {
        $seller = Seller::findOrFail($id);
        $seller->update(['status' => 'active']);

        return back()->with('success', 'Seller berhasil disetujui!');
    }

    public function reject($id) {
        $seller = Seller::findOrFail($id);
        $seller->update(['status' => 'rejected']);

        return back()->with('success', 'Seller ditolak.');
    }
}
