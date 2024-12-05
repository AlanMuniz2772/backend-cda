<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsumoSeeder extends Seeder
{
    public function run()
    {
        DB::table('insumos')->insert([
            ['id_tienda' => 1, 'nombre' => 'Insumo 1', 'costo' => 10.00, 'cantidad_tienda' => 100, 'cantidad_captura' => 0, 'unidad_medida' => 'unidad', 'is_available' => true],
            ['id_tienda' => 1, 'nombre' => 'Insumo 2', 'costo' => 5.00, 'cantidad_tienda' => 50, 'cantidad_captura' => 0, 'unidad_medida' => 'unidad', 'is_available' => true],
            ['id_tienda' => 1, 'nombre' => 'Insumo 3', 'costo' => 8.00, 'cantidad_tienda' => 70, 'cantidad_captura' => 0, 'unidad_medida' => 'unidad', 'is_available' => true],
            ['id_tienda' => 1, 'nombre' => 'Insumo 4', 'costo' => 12.50, 'cantidad_tienda' => 200, 'cantidad_captura' => 0, 'unidad_medida' => 'unidad', 'is_available' => true],
            ['id_tienda' => 1, 'nombre' => 'Insumo 5', 'costo' => 7.50, 'cantidad_tienda' => 30, 'cantidad_captura' => 0, 'unidad_medida' => 'unidad', 'is_available' => true],
            ['id_tienda' => 1, 'nombre' => 'Insumo 6', 'costo' => 15.00, 'cantidad_tienda' => 150, 'cantidad_captura' => 0, 'unidad_medida' => 'unidad', 'is_available' => true],
            ['id_tienda' => 1, 'nombre' => 'Insumo 7', 'costo' => 3.00, 'cantidad_tienda' => 20, 'cantidad_captura' => 0, 'unidad_medida' => 'unidad', 'is_available' => true],
            ['id_tienda' => 1, 'nombre' => 'Insumo 8', 'costo' => 20.00, 'cantidad_tienda' => 120, 'cantidad_captura' => 0, 'unidad_medida' => 'unidad', 'is_available' => true],
            ['id_tienda' => 1, 'nombre' => 'Insumo 9', 'costo' => 18.00, 'cantidad_tienda' => 40, 'cantidad_captura' => 0, 'unidad_medida' => 'unidad', 'is_available' => true],
            ['id_tienda' => 1, 'nombre' => 'Insumo 10', 'costo' => 6.00, 'cantidad_tienda' => 25, 'cantidad_captura' => 0, 'unidad_medida' => 'unidad', 'is_available' => true],
            ['id_tienda' => 1, 'nombre' => 'Insumo 11', 'costo' => 4.50, 'cantidad_tienda' => 35, 'cantidad_captura' => 0, 'unidad_medida' => 'unidad', 'is_available' => true],
        ]);
        
    }
}
