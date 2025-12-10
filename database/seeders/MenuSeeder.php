<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\Category;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $ramen = Category::where('name', 'Ramen')->first()->id;
        $donburi = Category::where('name', 'Donburi (Rice Bowl)')->first()->id;
        $side = Category::where('name', 'Side Dish')->first()->id;
        $drink = Category::where('name', 'Minuman')->first()->id;
        $dessert = Category::where('name', 'Dessert')->first()->id;

        $menus = [
            // Ramen
            ['category_id' => $ramen, 'name' => 'Shoyu Ramen', 'price' => 45000, 'image' => null],
            ['category_id' => $ramen, 'name' => 'Miso Ramen', 'price' => 50000, 'image' => null],
            ['category_id' => $ramen, 'name' => 'Tonkotsu Ramen', 'price' => 55000, 'image' => null],

            // Donburi
            ['category_id' => $donburi, 'name' => 'Gyudon', 'price' => 40000, 'image' => null],
            ['category_id' => $donburi, 'name' => 'Katsudon', 'price' => 45000, 'image' => null],

            // Side Dish
            ['category_id' => $side, 'name' => 'Takoyaki 5 pcs', 'price' => 25000, 'image' => null],
            ['category_id' => $side, 'name' => 'Gyoza 6 pcs', 'price' => 30000, 'image' => null],

            // Minuman
            ['category_id' => $drink, 'name' => 'Ocha Panas', 'price' => 8000, 'image' => null],
            ['category_id' => $drink, 'name' => 'Ocha Dingin', 'price' => 10000, 'image' => null],
            ['category_id' => $drink, 'name' => 'Lemon Tea', 'price' => 15000, 'image' => null],

            // Dessert
            ['category_id' => $dessert, 'name' => 'Mochi Ice Cream', 'price' => 20000, 'image' => null],
            ['category_id' => $dessert, 'name' => 'Dorayaki', 'price' => 18000, 'image' => null],
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}
