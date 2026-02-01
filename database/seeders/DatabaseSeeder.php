<?php

namespace Database\Seeders;

use App\Models\User;
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
        // Create Admin User
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@tuksports.com',
            'role' => 'admin',
            'password' => bcrypt('password'),
        ]);

        // Create Coach User
        User::factory()->create([
            'name' => 'Coach Carter',
            'email' => 'coach@tuksports.com',
            'role' => 'coach',
            'password' => bcrypt('password'),
        ]);

        // Create Fan User
        User::factory()->create([
            'name' => 'Fan User',
            'email' => 'fan@tuksports.com',
            'role' => 'fan',
            'password' => bcrypt('password'),
        ]);
    }
}
