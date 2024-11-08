<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    public function run()
    {
        DB::table('productos')->insert([
            ['id_tienda' => 1, 'nombre' => 'Producto 1', 'costo' => 50.00, 'utilidad' => 20.00, 'precio' => 70.00, 'is_available' => true],
            ['id_tienda' => 1, 'nombre' => 'Producto 2', 'costo' => 30.00, 'utilidad' => 15.00, 'precio' => 45.00, 'is_available' => true],
            ['id_tienda' => 1, 'nombre' => 'Producto 3', 'costo' => 80.00, 'utilidad' => 25.00, 'precio' => 105.00, 'is_available' => true],
        ]);
    }
}
