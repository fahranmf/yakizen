<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Menu;

class OrderItemSeeder extends Seeder
{
    public function run(): void
    {
        $menus = Menu::all();

        foreach (Order::all() as $order) {
            $total = 0;

            // Setiap order dapet 2–4 menu random
            $itemsCount = rand(2, 4);

            for ($i = 0; $i < $itemsCount; $i++) {
                $menu = $menus->random();
                $qty = rand(1, 3);

                $subtotal = $menu->price * $qty;

                OrderItem::create([
                    'order_id'  => $order->id,
                    'menu_id'   => $menu->id,
                    'quantity'  => $qty,
                    'price'     => $menu->price,
                ]);

                $total += $subtotal;
            }

            // update total price ke order
            $order->update([
                'total_price' => $total,
            ]);
        }
    }
}
