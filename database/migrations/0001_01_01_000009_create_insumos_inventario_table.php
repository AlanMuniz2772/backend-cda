<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsumosInventarioTable extends Migration
{
    public function up()
    {
        Schema::create('insumos_inventario', function (Blueprint $table) {
            $table->id();
            $table->integer('id_insumo')->nullable(false);
            $table->integer('id_inventario')->nullable(false);
            $table->integer('cantidad_tienda')->default(0);
            $table->integer('cantidad_captura')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('insumos_inventario');
    }
}
