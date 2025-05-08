<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::create([
            'name' => 'admin',
            'description' => 'Administrator dengan akses penuh'
        ]);

        Role::create([
            'name' => 'writer',
            'description' => 'Penulis yang dapat membuat artikel'
        ]);

        Role::create([
            'name' => 'reader',
            'description' => 'Pembaca yang hanya dapat membaca artikel'
        ]);
    }
}
