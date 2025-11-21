<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use App\Models\Seller;
use Illuminate\Support\Facades\Auth;

class SellerDashboardController extends Controller
{
    public function index()
    {
        // Ambil seller yang login
        $seller = Seller::where('user_id', Auth::id())->first();

        // Grafik stok per produk
        $stokProduk = Product::where('seller_id', $seller->id)
            ->pluck('stock', 'name');

        // Grafik rating per produk
        $ratingProduk = Product::where('seller_id', $seller->id)
            ->with('reviews')
            ->get()
            ->mapWithKeys(function ($product) {
                return [
                    $product->name => round($product->reviews->avg('rating'), 1)
                ];
            });

        // Grafik rating per provinsi
        $ratingProvinsi = Review::join('users', 'reviews.user_id', '=', 'users.id')
            ->join('products', 'reviews.product_id', '=', 'products.id')
            ->where('products.seller_id', $seller->id)
            ->selectRaw('users.province, COUNT(*) as total')
            ->groupBy('users.province')
            ->pluck('total', 'users.province');

        return view('seller.dashboard', compact(
            'stokProduk',
            'ratingProduk',
            'ratingProvinsi'
        ));
    }
}
