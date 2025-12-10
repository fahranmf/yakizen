<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Staff
        User::create([
            'name' => 'Staff 1',
            'email' => 'staff1@example.com',
            'password' => Hash::make('password'),
            'role' => 'staff',
        ]);

        User::create([
            'name' => 'Staff 2',
            'email' => 'staff2@example.com',
            'password' => Hash::make('password'),
            'role' => 'staff',
        ]);

        // Customer dummy
        User::create([
            'name' => 'Customer 1',
            'email' => 'customer1@example.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
        ]);

        User::create([
            'name' => 'Customer 2',
            'email' => 'customer2@example.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
        ]);
    }
}
