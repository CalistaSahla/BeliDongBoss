<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Seller;
use App\Models\User;

class SellerSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {

            // Buat user seller
            $user = User::create([
                'name' => "Seller $i",
                'email' => "seller$i@test.com",
                'password' => bcrypt('password'),
                'role' => 'seller'
            ]);

            // Buat data seller (SNAKE CASE SESUAI MIGRATION MU)
            Seller::create([
                'user_id'   => $user->id,
                'pic_name'  => "PIC Seller $i",
                'store_name' => "Toko Kampus $i",
                'email'     => "seller$i@test.com",
                'phone'     => "08" . rand(100000000, 999999999),
                'province'  => "Jawa Barat",
                'city'      => "Bandung",
                'address'   => "Alamat lengkap Seller $i",
                'status'    => "approved",
            ]);
        }
    }
}
