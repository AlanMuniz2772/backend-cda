<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoOrdenSeeder extends Seeder
{
    public function run()
    {
        DB::table('productos_ordenes')->insert([
            ['id_producto' => 1, 'id_orden' => 1, 'cantidad_producto' => 2, 'costo' => 50.00, 'utilidad' => 20.00, 'precio' => 70.00],
            ['id_producto' => 2, 'id_orden' => 2, 'cantidad_producto' => 1, 'costo' => 30.00, 'utilidad' => 15.00, 'precio' => 45.00],
            ['id_producto' => 3, 'id_orden' => 3, 'cantidad_producto' => 3, 'costo' => 80.00, 'utilidad' => 25.00, 'precio' => 105.00],
            ['id_producto' => 1, 'id_orden' => 4, 'cantidad_producto' => 2, 'costo' => 50.00, 'utilidad' => 20.00, 'precio' => 70.00],
            ['id_producto' => 2, 'id_orden' => 5, 'cantidad_producto' => 1, 'costo' => 30.00, 'utilidad' => 15.00, 'precio' => 45.00],
            ['id_producto' => 3, 'id_orden' => 6, 'cantidad_producto' => 3, 'costo' => 80.00, 'utilidad' => 25.00, 'precio' => 105.00],
            ['id_producto' => 1, 'id_orden' => 7, 'cantidad_producto' => 2, 'costo' => 50.00, 'utilidad' => 20.00, 'precio' => 70.00],
            ['id_producto' => 2, 'id_orden' => 8, 'cantidad_producto' => 1, 'costo' => 30.00, 'utilidad' => 15.00, 'precio' => 45.00],
        ]);
    }
}
