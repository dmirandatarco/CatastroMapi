<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tf_monumento', function (Blueprint $table) {
            $table->string('id_ficha',19)->unsigned();
            $table->foreign('id_ficha')->references('id_ficha')->on('tf_fichas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('cat_inmueble',2)->nullable();
            $table->string('nomb_monumento',150)->nullable();
            $table->string('cod_monumento',15)->nullable();
            $table->string('presencia_arquitectura',2)->nullable();
            $table->string('filiacion_cronologica',2)->nullable();
            $table->string('tipo_area',1)->nullable();
            $table->decimal('area_monu',11,2)->nullable();
            $table->decimal('perimetro_monumento',11,2)->nullable();
            $table->text('observaciones')->nullable();
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tf_monumento');
    }
};
