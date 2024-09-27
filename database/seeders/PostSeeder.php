<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Faker\Provider\Lorem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::truncate();

        for ($i = 1; $i <= 50; $i++) {
            $category = Category::inRandomOrder()->first();
            $title = Str::random(20);

            Post::create([
                'title' => $title,
                'slug' => Str::slug($title),
                'content' => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusantium quaerat fuga voluptates ad, quibusdam laudantium perspiciatis corrupti, a voluptatum quasi, impedit sequi in! Nesciunt sed ut alias esse officiis eos.",
                'category_id' => $category->id,
                'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.',
                'posted' => 'yes',
                'image' => ''
            ]);
        }
    }
}
