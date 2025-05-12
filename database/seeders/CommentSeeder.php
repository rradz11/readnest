<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run()
    {
        Comment::create([
            'content' => 'This is a great article!',
            'user_id' => 1, // Pastikan user_id ada di tabel users
            'article_id' => 1, // Pastikan article_id ada di tabel articles
        ]);

        Comment::create([
            'content' => 'Thanks for the insights!',
            'user_id' => 2,
            'article_id' => 1,
        ]);
    }
}
