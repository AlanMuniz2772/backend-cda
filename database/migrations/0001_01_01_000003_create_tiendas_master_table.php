<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiendasMasterTable extends Migration
{
    public function up()
    {
        Schema::create('tiendas_master', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_tienda');
            $table->string('calle')->nullable();
            $table->string('colonia')->nullable();
            $table->string('ciudad', 100)->nullable();
            $table->string('estado', 100)->nullable();
            $table->string('pais', 100)->nullable();
            $table->string('codigo_postal', 20)->nullable();
            $table->string('telefono', 20)->nullable();
            $table->boolean('activado')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tiendas_master');
    }
}
