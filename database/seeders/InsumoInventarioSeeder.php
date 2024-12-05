<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsumoInventarioSeeder extends Seeder
{
    public function run()
    {
        DB::table('insumos_inventario')->insert([
            // Inventario 1
            ['id_insumo' => 1, 'id_inventario' => 1, 'cantidad_tienda' => 100, 'cantidad_captura' => 95],
            ['id_insumo' => 2, 'id_inventario' => 1, 'cantidad_tienda' => 50, 'cantidad_captura' => 48],
            ['id_insumo' => 3, 'id_inventario' => 1, 'cantidad_tienda' => 70, 'cantidad_captura' => 68],
            ['id_insumo' => 4, 'id_inventario' => 1, 'cantidad_tienda' => 200, 'cantidad_captura' => 190],
            ['id_insumo' => 5, 'id_inventario' => 1, 'cantidad_tienda' => 30, 'cantidad_captura' => 25],
        
            // Inventario 2
            ['id_insumo' => 1, 'id_inventario' => 2, 'cantidad_tienda' => 110, 'cantidad_captura' => 105],
            ['id_insumo' => 2, 'id_inventario' => 2, 'cantidad_tienda' => 60, 'cantidad_captura' => 58],
            ['id_insumo' => 3, 'id_inventario' => 2, 'cantidad_tienda' => 80, 'cantidad_captura' => 75],
            ['id_insumo' => 6, 'id_inventario' => 2, 'cantidad_tienda' => 150, 'cantidad_captura' => 140],
            ['id_insumo' => 7, 'id_inventario' => 2, 'cantidad_tienda' => 20, 'cantidad_captura' => 18],
        
            // Inventario 3
            ['id_insumo' => 1, 'id_inventario' => 3, 'cantidad_tienda' => 95, 'cantidad_captura' => 90],
            ['id_insumo' => 3, 'id_inventario' => 3, 'cantidad_tienda' => 60, 'cantidad_captura' => 55],
            ['id_insumo' => 4, 'id_inventario' => 3, 'cantidad_tienda' => 210, 'cantidad_captura' => 200],
            ['id_insumo' => 8, 'id_inventario' => 3, 'cantidad_tienda' => 120, 'cantidad_captura' => 115],
            ['id_insumo' => 9, 'id_inventario' => 3, 'cantidad_tienda' => 40, 'cantidad_captura' => 38],
        
            // Inventario 4
            ['id_insumo' => 2, 'id_inventario' => 4, 'cantidad_tienda' => 65, 'cantidad_captura' => 63],
            ['id_insumo' => 5, 'id_inventario' => 4, 'cantidad_tienda' => 45, 'cantidad_captura' => 40],
            ['id_insumo' => 6, 'id_inventario' => 4, 'cantidad_tienda' => 160, 'cantidad_captura' => 150],
            ['id_insumo' => 10, 'id_inventario' => 4, 'cantidad_tienda' => 25, 'cantidad_captura' => 20],
            ['id_insumo' => 11, 'id_inventario' => 4, 'cantidad_tienda' => 35, 'cantidad_captura' => 30],
        ]);
        
    }
}
