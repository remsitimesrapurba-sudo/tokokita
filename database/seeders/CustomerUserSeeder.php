<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class CustomerUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'customer@example.com'],
            [
                'name' => 'Customer Dummy',
                'password' => Hash::make('customer123'),
                'role' => 'customer',
            ]
        );
    }
}
