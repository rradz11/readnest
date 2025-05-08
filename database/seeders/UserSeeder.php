<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password123'),
            'role_id' => 1
        ]);

        User::create([
            'name' => 'Writer User',
            'email' => 'writer@example.com',
            'password' => bcrypt('password123'),
            'role_id' => 2
        ]);

        User::create([
            'name' => 'Reader User',
            'email' => 'reader@example.com',
            'password' => bcrypt('password123'),
            'role_id' => 3
        ]);
    }
}
