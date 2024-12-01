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
        $categories = [
            'Gucci',
            'Balenciaga',
            'Saint Laurent Paris',
            'Yves Saint Laurent',
            'Bottega Veneta',
            'Brioni',
            'Pomellato',
            'Ulysse Nardin.',
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'image' => 'https://via.placeholder.com/150',
            ]);
        }
    }
}
