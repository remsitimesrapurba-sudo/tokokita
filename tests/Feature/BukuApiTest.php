<?php

namespace Tests\Feature;

use App\Models\Buku;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class BukuApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_returns_sanctum_token(): void
    {
        $user = User::create([
            'name' => 'API User',
            'email' => 'api@example.com',
            'password' => Hash::make('secret123'),
            'role' => 'pustakawan',
        ]);

        $response = $this->postJson('/api/login', [
            'email' => $user->email,
            'password' => 'secret123',
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure(['message', 'token']);
    }

    public function test_protected_buku_endpoint_requires_token(): void
    {
        Buku::create([
            'judul' => 'Laskar Pelangi',
            'pengarang' => 'Andrea Hirata',
            'tahun_terbit' => 2005,
        ]);

        $response = $this->getJson('/api/buku');

        $response->assertStatus(401);

        $user = User::create([
            'name' => 'API User 2',
            'email' => 'api2@example.com',
            'password' => Hash::make('secret123'),
            'role' => 'pustakawan',
        ]);

        $token = $user->createToken('test-token')->plainTextToken;

        $authorized = $this->withHeader('Authorization', 'Bearer ' . $token)
            ->getJson('/api/buku');

        $authorized->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id_buku',
                        'judul_buku',
                        'pengarang_buku',
                        'tahun_terbit',
                    ],
                ],
            ]);
    }
}
