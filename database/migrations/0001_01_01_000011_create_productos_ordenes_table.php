<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosOrdenesTable extends Migration
{
    public function up()
    {
        Schema::create('productos_ordenes', function (Blueprint $table) {
            $table->id();
            $table->integer('id_producto')->nullable(false);
            $table->integer('id_orden')->nullable(false);
            $table->integer('cantidad_producto');
            $table->decimal('costo', 10, 2);
            $table->decimal('utilidad', 5, 2)->nullable();
            $table->decimal('precio', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('productos_ordenes');
    }
}
