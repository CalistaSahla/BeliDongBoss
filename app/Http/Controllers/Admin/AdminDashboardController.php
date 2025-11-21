<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\Review;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Grafik 1: Produk per kategori
        $produkKategori = Product::selectRaw('category, COUNT(*) as total')
                                ->groupBy('category')
                                ->pluck('total', 'category');

        // Grafik 2: Produk berdasarkan kondisi
        $produkKondisi = Product::selectRaw('`condition`, COUNT(*) as total')
                                ->groupBy('condition')
                                ->pluck('total', 'condition');

        // Grafik 3: User aktif vs tidak aktif
        $userAktif = User::whereNotNull('last_login_at')->count();
        $userTidakAktif = User::whereNull('last_login_at')->count();

        // Grafik 4: Pemberi rating berdasarkan provinsi
        $ratingProvinsi = Review::join('users', 'reviews.user_id', '=', 'users.id')
                                ->selectRaw('users.province, COUNT(*) as total')
                                ->groupBy('users.province')
                                ->pluck('total', 'users.province');

        return view('admin.dashboard', [
            'produkKategori' => $produkKategori,
            'produkKondisi' => $produkKondisi,
            'userAktif' => $userAktif,
            'userTidakAktif' => $userTidakAktif,
            'ratingProvinsi' => $ratingProvinsi,
        ]);
    }
}
