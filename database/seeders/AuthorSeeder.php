<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    public function run()
    {
        Author::create([
            'user_id' => 2,
            'bio' => 'Penulis berpengalaman dalam teknologi dan lifestyle.',
            'profile_picture' => 'images/writer.jpg'
        ]);

        Author::create([
            'user_id' => 1,
            'bio' => 'Admin sekaligus penulis konten inspiratif.',
            'profile_picture' => 'images/admin.jpg'
        ]);
    }
}
