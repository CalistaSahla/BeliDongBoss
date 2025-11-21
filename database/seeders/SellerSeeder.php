<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Seller;
use App\Models\User;

class SellerSeeder extends Seeder
{
    public function run(): void
    {
        // buat akun user seller
        $user = User::create([
            'name' => 'Dummy Seller',
            'email' => 'seller@test.com',
            'password' => bcrypt('password'),
            'role' => 'seller',
        ]);

        // buat data seller
        Seller::create([
            'user_id' => $user->id,
            'storeName' => 'Toko Dummy',
            'storeDescription' => 'Toko dummy untuk testing katalog.',
            'picName' => 'Dummy PIC',
            'picPhone' => '081234567890',
            'picEmail' => 'pic@test.com',
            'picStreet' => 'Jalan Dummy',
            'picRT' => '01',
            'picRW' => '02',
            'picVillage' => 'Desa Dummy',
            'picCity' => 'Bandung',
            'picProvince' => 'Jawa Barat',
            'picKtpNumber' => '1234567890123456',
            'picPhoto' => 'dummy.jpg',
            'picKtpFile' => 'dummy-ktp.jpg',
            'status' => 'active',
        ]);
    }
}
