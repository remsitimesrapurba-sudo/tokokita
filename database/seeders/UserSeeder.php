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
        // Membuat satu akun Pustakawan bawaan
        User::updateOrCreate(
            ['email' => 'pustakawan@kampus.ac.id'],
            [
                'name' => 'Pustakawan Kampus',
                'password' => Hash::make('pustakawan123'),
                'role' => 'pustakawan',
            ]
        );
    }
}
