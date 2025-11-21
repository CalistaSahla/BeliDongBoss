<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Seller;
use App\Models\Product;
use App\Models\Review;
use PDF;

class LaporanController extends Controller
{
    public function user()
    {
        $users = User::all();
        return view('admin.laporan.user', compact('users'));
    }

    public function userPdf()
    {
        $users = User::all();
        $pdf = PDF::loadView('admin.laporan.user_pdf', compact('users'));
        return $pdf->download('laporan-data-user.pdf');
    }

    public function seller()
    {
        $sellers = Seller::with('user')->get();
        return view('admin.laporan.seller', compact('sellers'));
    }

    public function sellerPdf()
    {
        $sellers = Seller::with('user')->get();
        $pdf = PDF::loadView('admin.laporan.seller_pdf', compact('sellers'));
        return $pdf->download('laporan-data-seller.pdf');
    }

    public function produk()
    {
        $products = Product::with('seller')->get();
        return view('admin.laporan.produk', compact('products'));
    }

    public function produkPdf()
    {
        $products = Product::with('seller')->get();
        $pdf = PDF::loadView('admin.laporan.produk_pdf', compact('products'));
        return $pdf->download('laporan-data-produk.pdf');
    }

    public function rating()
    {
        $ratings = Review::with(['product', 'user'])->get();
        return view('admin.laporan.rating', compact('ratings'));
    }

    public function ratingPdf()
    {
        $ratings = Review::with(['product', 'user'])->get();
        $pdf = PDF::loadView('admin.laporan.rating_pdf', compact('ratings'));
        return $pdf->download('laporan-data-rating.pdf');
    }

    public function ratingTertinggi()
    {
        $ratings = Review::with('product')
            ->orderBy('rating', 'desc')
            ->take(10)
            ->get();

        return view('admin.laporan.rating_tertinggi', compact('ratings'));
    }

    public function ratingTertinggiPdf()
    {
        $ratings = Review::with('product')
            ->orderBy('rating', 'desc')
            ->take(10)
            ->get();

        $pdf = PDF::loadView('admin.laporan.rating_tertinggi_pdf', compact('ratings'));
        return $pdf->download('laporan-rating-tertinggi.pdf');
    }

    public function ratingTerendah()
    {
        $ratings = Review::with('product')
            ->orderBy('rating', 'asc')
            ->take(10)
            ->get();

        return view('admin.laporan.rating_terendah', compact('ratings'));
    }

    public function ratingTerendahPdf()
    {
        $ratings = Review::with('product')
            ->orderBy('rating', 'asc')
            ->take(10)
            ->get();

        $pdf = PDF::loadView('admin.laporan.rating_terendah_pdf', compact('ratings'));
        return $pdf->download('laporan-rating-terendah.pdf');
    }
}
