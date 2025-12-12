<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Create a test user
        User::create([
            'name' => 'Test User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'user_type' => 'user',
        ]);

        // Create a test staff
        User::create([
            'name' => 'Test Staff',
            'email' => 'staff@example.com',
            'password' => Hash::make('password'),
            'user_type' => 'staff',
        ]);
    }
}