<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsumoSeeder extends Seeder
{
    public function run()
    {
        DB::table('insumos')->insert([
            ['id_tienda' => 1, 'nombre' => 'insumo 1', 'costo' => 10.00, 'cantidad_tienda' => 100, 'cantidad_captura' => 0, 'unidad_medida' => 'unidad', 'is_available' => true],
            ['id_tienda' => 1, 'nombre' => 'insumo 2', 'costo' => 5.00, 'cantidad_tienda' => 50, 'cantidad_captura' => 0, 'unidad_medida' => 'unidad', 'is_available' => true],
            ['id_tienda' => 1, 'nombre' => 'insumo 3', 'costo' => 8.00, 'cantidad_tienda' => 70, 'cantidad_captura' => 0, 'unidad_medida' => 'unidad', 'is_available' => true],
        ]);
    }
}
