<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class BukuRoleUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'pustakawan@example.com'],
            [
                'name' => 'Pustakawan Dummy',
                'password' => Hash::make('pustakawan123'),
                'role' => 'pustakawan',
            ]
        );

        User::updateOrCreate(
            ['email' => 'anggota@example.com'],
            [
                'name' => 'Anggota Dummy',
                'password' => Hash::make('anggota123'),
                'role' => 'anggota',
            ]
        );
    }
}
