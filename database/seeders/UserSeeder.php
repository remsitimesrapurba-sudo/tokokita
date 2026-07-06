<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Pustakawan Kampus',
            'email' => 'pustakawan@kampus.ac.id',
            'password' => Hash::make('pustakawan123'),
            'role' => 'pustakawan',
        ]);

        User::create([
            'name' => 'Customer1',
            'email' => 'customer1@mdh.co.id',
            'password' => Hash::make('password'),
            'role' => 'customer',
        ]);

        User::create([
            'name' => 'Administrator Toko',
            'email' => 'admin@tokokita.com',
            'password' => Hash::make('rahasia123'),
            'role' => 'admin',
        ]);
    }
}
