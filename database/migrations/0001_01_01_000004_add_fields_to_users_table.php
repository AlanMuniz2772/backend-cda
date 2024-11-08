<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('id_tienda')->nullable(false);
            $table->boolean('is_owner')->default(0);
            $table->string('rol_operacion', 100)->nullable();
            $table->decimal('sueldo_semanal', 10, 2)->nullable();
            $table->decimal('bono_semanal', 10, 2)->nullable();
            $table->decimal('horas_trabajadas', 5, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['id_tienda', 'is_owner', 'rol_operacion', 'sueldo_semanal', 'bono_semanal', 'horas_trabajadas']);
        });
    }
};
