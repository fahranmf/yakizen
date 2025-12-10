<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Table;

class TableSeeder extends Seeder
{
    public function run(): void
    {
        // Generate meja 1 sampai 20
        for ($i = 1; $i <= 20; $i++) {
            Table::create([
                'table_number' => "$i",
                'status' => 'available',
            ]);
        }
    }
}
