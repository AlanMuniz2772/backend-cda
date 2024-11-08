<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->integer('id_tienda')->nullable(false);
            $table->string('nombre');
            $table->decimal('costo', 10, 2);
            $table->decimal('utilidad', 5, 2)->nullable();
            $table->decimal('precio', 10, 2);
            $table->boolean('is_available')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
