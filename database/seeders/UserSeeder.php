<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin BDB',
            'email' => 'admin@bdb.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // 10 user biasa
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'name' => "User $i",
                'email' => "user$i@test.com",
                'password' => Hash::make('password'),
                'role' => 'user',
            ]);
        }
    }
}
