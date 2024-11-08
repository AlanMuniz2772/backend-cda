<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiendaSeeder extends Seeder
{
    public function run()
    {
        DB::table('tiendas_master')->insert([
            'nombre_tienda' => 'Tienda Principal',
            'calle' => 'Av. Principal 123',
            'colonia' => 'Centro',
            'ciudad' => 'Ciudad Ejemplo',
            'estado' => 'Estado Ejemplo',
            'pais' => 'País Ejemplo',
            'codigo_postal' => '12345',
            'telefono' => '1234567890',
            'activado' => true,
        ]);
    }
}
