<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['admin', 'buyer', 'cslayer1', 'cslayer2'];

        foreach ($roles as $role) {
            User::create([
                'name' => ucfirst($role) . ' User', // Contoh: Admin User
                'email' => strtolower(str_replace(' ', '', $role)) . '@example.com', // Contoh: admin@example.com
                'password' => Hash::make('@Password123'), // Hashing password
                'role' => $role,
            ]);
        }
    }
}
