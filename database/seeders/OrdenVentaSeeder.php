<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdenVentaSeeder extends Seeder
{
    public function run()
    {
        DB::table('orden_venta')->insert([
            ['id_tienda' => 1, 'fecha' => now(), 'tipo_pago' => 1, 'is_registered' => true],
            ['id_tienda' => 1, 'fecha' => now(), 'tipo_pago' => 2, 'is_registered' => true],
            ['id_tienda' => 1, 'fecha' => now(), 'tipo_pago' => 1, 'is_registered' => true],
            ['id_tienda' => 1, 'fecha' => now()->subDays(1), 'tipo_pago' => 2, 'is_registered' => true],
            ['id_tienda' => 1, 'fecha' => now()->subDays(2), 'tipo_pago' => 1, 'is_registered' => true],
            ['id_tienda' => 1, 'fecha' => now()->subDays(3), 'tipo_pago' => 2, 'is_registered' => true],
            ['id_tienda' => 1, 'fecha' => now()->subDays(4), 'tipo_pago' => 1, 'is_registered' => true],
            ['id_tienda' => 1, 'fecha' => now()->subDays(5), 'tipo_pago' => 2, 'is_registered' => true],
    ]);
    }
}
