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
        Schema::create('tf_ficha_bien_cultural', function (Blueprint $table) {
            $table->string('id_ficha',19)->unsigned();
            $table->foreign('id_ficha')->references('id_ficha')->on('tf_fichas')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('area_titulo',7,2)->nullable();
            $table->decimal('area_construido',7,2)->nullable();
            $table->decimal('area_libre',7,2)->nullable();
            $table->string('descripcion_fachada',350)->nullable();
            $table->string('descripcion_interior',350)->nullable();
            $table->string('filiacion_estilistica',2)->nullable();
            $table->string('intervencion_inmueble',2)->nullable();
            $table->string('resena_historica',350)->nullable();
            $table->string('cond_declarante',2)->nullable();
            $table->string('esta_llenado',1)->nullable();
            $table->integer('nume_habitantes')->nullable();
            $table->integer('nume_familias')->nullable();
            $table->string('nume_ficha',7)->nullable();
            $table->string('crc_rural',20)->nullable();
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tf_ficha_bien_cultural');
    }
};
