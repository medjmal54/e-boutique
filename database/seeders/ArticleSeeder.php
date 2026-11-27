<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::factory()->count(40)->create();
        Article::factory()->count(5)->epuise()->create();
        Article::factory()->count(3)->inactif()->create();
    }
}
