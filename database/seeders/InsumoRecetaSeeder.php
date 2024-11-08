<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsumoRecetaSeeder extends Seeder
{
    public function run()
    {
        DB::table('insumos_productos')->insert([
            ['id_producto' => 1, 'id_insumo' => 1, 'cantidad' => 2],
            ['id_producto' => 1, 'id_insumo' => 2, 'cantidad' => 3],
            ['id_producto' => 2, 'id_insumo' => 3, 'cantidad' => 1],
        ]);
    }
}
