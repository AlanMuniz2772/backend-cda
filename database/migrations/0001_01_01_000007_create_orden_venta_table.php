<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenVentaTable extends Migration
{
    public function up()
    {
        Schema::create('orden_venta', function (Blueprint $table) {
            $table->id();
            $table->integer('id_tienda')->nullable(false);
            $table->timestamp('fecha')->useCurrent();
            $table->integer('tipo_pago');
            $table->boolean('is_registered')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orden_venta');
    }
}
