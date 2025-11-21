<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Seller;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $seller = Seller::first(); // seller dummy di atas

        $dummyProducts = [
            [
                'name' => 'Jas Lab Putih Premium',
                'category' => 'Tools Praktikum',
                'condition' => 'Baru',
                'price' => 65000,
                'stock' => 20,
                'description' => 'Jas lab putih premium bahan tebal dan nyaman.',
                'thumbnail' => 'dummy/jaslab.jpg',
                'images' => json_encode(['dummy/jaslab.jpg']),
            ],
            [
                'name' => 'Kalkulator Scientific 991 ID PLUS',
                'category' => 'ATK & Perlengkapan',
                'condition' => 'Baru',
                'price' => 75000,
                'stock' => 35,
                'description' => 'Kalkulator scientific lengkap untuk mahasiswa.',
                'thumbnail' => 'dummy/kalkulator.jpg',
                'images' => json_encode(['dummy/kalkulator.jpg']),
            ],
            [
                'name' => 'Sticker Asbun Mahasiswa',
                'category' => 'Outfit Kampus',
                'condition' => 'Baru',
                'price' => 3000,
                'stock' => 200,
                'description' => 'Sticker meme mahasiswa untuk laptop/HP.',
                'thumbnail' => 'dummy/sticker.jpg',
                'images' => json_encode(['dummy/sticker.jpg']),
            ],
        ];

        foreach ($dummyProducts as $p) {
            Product::create([
                'seller_id' => $seller->id,
                'name' => $p['name'],
                'category' => $p['category'],
                'condition' => $p['condition'],
                'price' => $p['price'],
                'stock' => $p['stock'],
                'description' => $p['description'],
                'thumbnail' => $p['thumbnail'],
                'images' => $p['images'],
            ]);
        }
    }
}
