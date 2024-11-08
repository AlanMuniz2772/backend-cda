<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsumosTable extends Migration
{
    public function up()
    {
        Schema::create('insumos', function (Blueprint $table) {
            $table->id();
            $table->integer('id_tienda')->nullable(false);
            $table->string('nombre');
            $table->decimal('costo', 10, 2);
            $table->integer('cantidad_tienda')->default(0);
            $table->integer('cantidad_captura')->default(0);
            $table->string('unidad_medida', 50)->nullable();
            $table->boolean('is_available')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('insumos');
    }
}
