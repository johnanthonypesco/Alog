<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'System Owner',
            'email' => 'admin@alog.com', // <--- Use this to login
            'password' => Hash::make('password123'), // <--- Your password
            'role_id' => 1, // Assumes ID 1 is Super Admin
            'is_active' => true,
        ]);
    }
}