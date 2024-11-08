<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Llama a cada seeder
        $this->call([
            TiendaSeeder::class,
            UserSeeder::class,
            ProductoSeeder::class,
            InsumoSeeder::class,
            OrdenVentaSeeder::class,
            InventarioSeeder::class,
            InsumoInventarioSeeder::class,
            InsumoRecetaSeeder::class,
            ProductoOrdenSeeder::class,
        ]);
    }
}
