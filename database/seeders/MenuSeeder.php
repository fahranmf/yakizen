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
            ['category_id' => $ramen, 'name' => 'Shoyu Ramen', 'price' => 45000, 'image' => 'menus/01KC6MZERV486BJWR1MDY72K5B.jpg'],
            ['category_id' => $ramen, 'name' => 'Miso Ramen', 'price' => 50000, 'image' => 'menus/01KC6N25QVAG146AJTSV4DAJFW.jpeg'],
            ['category_id' => $ramen, 'name' => 'Tonkotsu Ramen', 'price' => 55000, 'image' => 'menus/01KC6N3D9ZKVBAS6EN5RKK06DJ.jpg'],

            // Donburi
            ['category_id' => $donburi, 'name' => 'Gyudon', 'price' => 40000, 'image' => 'menus/01KC6NBTKF3Q4PCWKY0RQ1H93N.jpg'],
            ['category_id' => $donburi, 'name' => 'Katsudon', 'price' => 45000, 'image' => 'menus/01KC6NDF7DPVXWM0FQTB10Y8BS.jpg'],

            // Side Dish
            ['category_id' => $side, 'name' => 'Takoyaki 5 pcs', 'price' => 25000, 'image' => 'menus/01KC6NG7ED32ATE3145XEA7ER8.jpg'],
            ['category_id' => $side, 'name' => 'Gyoza 6 pcs', 'price' => 30000, 'image' => 'menus/01KC6NHX2SYJYTN508JEYD7K09.jpg'],

            // Minuman
            ['category_id' => $drink, 'name' => 'Ocha Panas', 'price' => 8000, 'image' => 'menus/01KC6NK993YERNG4HMKC4WQAF6.jpg'],
            ['category_id' => $drink, 'name' => 'Ocha Dingin', 'price' => 10000, 'image' => 'menus/01KC6NNR3Z1RXM0XYZ0378ZV8W.jpg'],
            ['category_id' => $drink, 'name' => 'Lemon Tea', 'price' => 15000, 'image' => 'menus/01KC6NQ0K4YYJBA5CV8W5AF0ZY.avif'],

            // Dessert
            ['category_id' => $dessert, 'name' => 'Mochi Ice Cream', 'price' => 20000, 'image' => 'menus/01KC6NRJABPE85D531CAWF57GD.jpg'],
            ['category_id' => $dessert, 'name' => 'Dorayaki', 'price' => 18000, 'image' => 'menus/01KC6NTA9XRVH0YN0TRZANJVZX.jpg'],
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}
