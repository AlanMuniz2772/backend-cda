<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'id_tienda' => 1,
            'is_owner' => true,
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'remember_token' => \Str::random(10),
            'rol_operacion' => 'administrador',
            'sueldo_semanal' => 5000.00,
            'bono_semanal' => 500.00,
            'horas_trabajadas' => 40,
        ]);
    }
}
