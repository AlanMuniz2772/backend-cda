<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsumosProductosTable extends Migration
{
    public function up()
    {
        Schema::create('insumos_productos', function (Blueprint $table) {
            $table->id();
            $table->integer('id_producto')->nullable(false);
            $table->integer('id_insumo')->nullable(false);
            $table->integer('cantidad');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('insumos_productos');
    }
}
