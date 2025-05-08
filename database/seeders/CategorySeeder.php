<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create([
            'name' => 'Teknologi',
            'description' => 'Artikel tentang perkembangan teknologi terbaru'
        ]);

        Category::create([
            'name' => 'Lifestyle',
            'description' => 'Tips dan inspirasi gaya hidup sehari-hari'
        ]);

        Category::create([
            'name' => 'Pendidikan',
            'description' => 'Informasi dan panduan tentang pendidikan'
        ]);
    }
}
