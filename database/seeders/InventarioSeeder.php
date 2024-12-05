<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventarioSeeder extends Seeder
{
    public function run()
    {
        DB::table('inventarios')->insert([
            ['id_tienda' => 1, 'fecha' => now()->subDays(2)],
            ['id_tienda' => 1, 'fecha' => now()->subDays(1)],
            ['id_tienda' => 1, 'fecha' => now()->subDays(3)],
            ['id_tienda' => 1, 'fecha' => now()->subDays(4)],
        ]);
    }
}
