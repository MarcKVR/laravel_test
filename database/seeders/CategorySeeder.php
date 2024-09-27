<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Category::truncate();

        for ($i = 1; $i <= 20; $i++) {
            Category::create(
                [
                    'title' => "Categoria $i",
                    'slug' => "categoria-$i"
                ]
            );
        }
    }
}
