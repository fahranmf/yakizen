<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Ramen',
            'Donburi (Rice Bowl)',
            'Side Dish',
            'Minuman',
            'Dessert',
        ];

        foreach ($categories as $cat) {
            Category::create(['name' => $cat]);
        }
    }
}
