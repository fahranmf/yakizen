<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Table;
use App\Models\User;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first(); // ambil user pertama
        $tables = Table::pluck('id')->toArray(); // semua id meja

        // bikin 5 order dummy
        for ($i = 1; $i <= 5; $i++) {
            Order::create([
                'user_id' => $user->id,
                'table_id' => $tables[array_rand($tables)],
                'total_price' => 0, // nanti dihitung setelah isi order item
                'status' => 'pending',
            ]);
        }
    }
}
