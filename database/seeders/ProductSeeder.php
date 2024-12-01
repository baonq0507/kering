<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Level;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();
        $level1 = Level::where('id', 1)->first();
        $level2 = Level::where('id', 2)->first();
        $level3 = Level::where('id', 3)->first();
        $level4 = Level::where('id', 4)->first();
        foreach ($categories as $category) {
            for($i = 1; $i <= 100; $i++) {
                Product::create([
                    'name' => $category->name . ' ' . $level1->name,
                    'category_id' => $category->id,
                    'level_id' => $level1->id,
                    'price' => rand(1000000, 10000000),
                    'image' => 'https://via.placeholder.com/150',
                    'description' => 'Mô tả sản phẩm',
                ]);
            }
            for($i = 1; $i <= 100; $i++) {
                Product::create([
                    'name' => $category->name . ' ' . $level2->name,
                    'category_id' => $category->id,
                    'level_id' => $level2->id,
                    'price' => rand(1000000, 10000000),
                    'image' => 'https://via.placeholder.com/150',
                    'description' => 'Mô tả sản phẩm',
                ]);
            }
            for($i = 1; $i <= 100; $i++) {
                Product::create([
                    'name' => $category->name . ' ' . $level3->name,
                    'category_id' => $category->id,
                    'level_id' => $level3->id,
                    'price' => rand(1000000, 10000000),
                    'image' => 'https://via.placeholder.com/150',
                    'description' => 'Mô tả sản phẩm',
                ]);
            }

            for($i = 1; $i <= 100; $i++) {
                Product::create([
                    'name' => $category->name . ' ' . $level4->name,
                    'category_id' => $category->id,
                    'level_id' => $level4->id,
                    'price' => rand(1000000, 10000000),
                    'image' => 'https://via.placeholder.com/150',
                    'description' => 'Mô tả sản phẩm',
                ]);
            }
        }
    }

}


