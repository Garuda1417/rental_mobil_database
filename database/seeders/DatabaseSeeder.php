<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Showroom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create User
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Create Showrooms
        Showroom::create([
            'name' => 'Jakarta Experience Center',
            'address' => 'Jl. Jenderal Sudirman No. 1',
            'city' => 'Jakarta',
            'phone' => '(021) 1234-5678',
        ]);

        Showroom::create([
            'name' => 'Surabaya Showroom',
            'address' => 'Jl. Ahmad Yani No. 88',
            'city' => 'Surabaya',
            'phone' => '(031) 5678-9012',
        ]);

        Showroom::create([
            'name' => 'Bandung Gallery',
            'address' => 'Jl. Asia Afrika No. 42',
            'city' => 'Bandung',
            'phone' => '(022) 9012-3456',
        ]);

        Showroom::create([
            'name' => 'Medan Branch',
            'address' => 'Jl. Gatot Subroto No. 15',
            'city' => 'Medan',
            'phone' => '(061) 3456-7890',
        ]);
    }
}

