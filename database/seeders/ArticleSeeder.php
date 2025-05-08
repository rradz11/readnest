<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        Article::create([
            'title' => 'Masa Depan AI dalam Teknologi',
            'content' => 'Artikel ini membahas bagaimana AI akan mengubah dunia teknologi di masa depan...',
            'author_id' => 1,
            'category_id' => 1,
            'status' => 'published',
            'published_at' => now()
        ]);

        Article::create([
            'title' => 'Tips Hidup Minimalis',
            'content' => 'Pelajari cara hidup sederhana dengan gaya minimalis...',
            'author_id' => 2,
            'category_id' => 2,
            'status' => 'published',
            'published_at' => now()
        ]);

        Article::create([
            'title' => 'Strategi Belajar Efektif',
            'content' => 'Panduan untuk meningkatkan efektivitas belajar Anda...',
            'author_id' => 2,
            'category_id' => 3,
            'status' => 'draft'
        ]);
    }
}
