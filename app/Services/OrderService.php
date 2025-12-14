<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class OrderService
{
    public function createFromCart(array $cart, int $userId, int $tableId): Order
    {
        return DB::transaction(function () use ($cart, $userId, $tableId) {

            $total = collect($cart)->sum(fn ($item) =>
                $item['price'] * $item['qty']
            );

            $order = Order::create([
                'user_id' => $userId,
                'table_id' => $tableId,
                'total_price' => $total,
                'status' => 'pending',
            ]);

            foreach ($cart as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'menu_id' => $item['id'],
                    'quantity' => $item['qty'],
                    'price' => $item['price'],
                ]);
            }

            return $order;
        });
    }
}
