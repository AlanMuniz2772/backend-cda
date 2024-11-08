<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsumoInventarioSeeder extends Seeder
{
    public function run()
    {
        DB::table('insumos_inventario')->insert([
            ['id_insumo' => 1, 'id_inventario' => 1, 'cantidad_tienda' => 100, 'cantidad_captura' => 0],
            ['id_insumo' => 2, 'id_inventario' => 1, 'cantidad_tienda' => 50, 'cantidad_captura' => 0],
            ['id_insumo' => 3, 'id_inventario' => 1, 'cantidad_tienda' => 70, 'cantidad_captura' => 0],
        ]);
    }
}
