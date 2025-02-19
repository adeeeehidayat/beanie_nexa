<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'username' => 'budi123',
                'email' => 'budi@example.com',
                'password' => Hash::make('password123'),
                'name' => 'Budi Santoso',
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'siti_ayu',
                'email' => 'siti@example.com',
                'password' => Hash::make('password123'),
                'name' => 'Siti Ayu Lestari',
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'agus_setiawan',
                'email' => 'agus@example.com',
                'password' => Hash::make('password123'),
                'name' => 'Agus Setiawan',
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'ratna_dewi',
                'email' => 'ratna@example.com',
                'password' => Hash::make('password123'),
                'name' => 'Ratna Dewi',
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'dian_purnama',
                'email' => 'dian@example.com',
                'password' => Hash::make('password123'),
                'name' => 'Dian Purnama',
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'joko_prayitno',
                'email' => 'joko@example.com',
                'password' => Hash::make('password123'),
                'name' => 'Joko Prayitno',
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
