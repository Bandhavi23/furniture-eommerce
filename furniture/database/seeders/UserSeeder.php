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
        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@furniturestore.com',
            'phone' => '9876543210',
            'password' => Hash::make('password123'),
            'email_verified_at' => now(),
        ]);

        // Create sample customer
        User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '9876543211',
            'password' => Hash::make('password123'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'phone' => '9876543212',
            'password' => Hash::make('password123'),
            'email_verified_at' => now(),
        ]);
    }
} 