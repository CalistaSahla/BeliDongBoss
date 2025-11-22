<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Seller;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Buku & Referensi',
            'Tools Praktikum',
            'Gadget & Teknologi',
            'ATK & Perlengkapan',
            'Outfit Kampus',
            'Kantin',
        ];

        $images = [
            'produk1.jpg', 'produk2.jpg', 'produk3.jpg',
            'produk4.jpg', 'produk5.jpg'
        ];

        $sellers = Seller::pluck('id')->toArray();

        for ($i = 1; $i <= 100; $i++) {
            Product::create([
                'seller_id' => $sellers[array_rand($sellers)],
                'name' => "Produk Kampus $i",
                'image' => $images[array_rand($images)],
                'price' => rand(10000, 500000),
                'stock' => rand(1, 30),
                'category' => $categories[array_rand($categories)],
                'description' => "Deskripsi lengkap Produk Kampus $i.",
            ]);
        }
    }
}
