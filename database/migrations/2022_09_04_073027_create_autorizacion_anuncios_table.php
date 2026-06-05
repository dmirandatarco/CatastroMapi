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
        Schema::create('tf_autorizaciones_anuncios', function (Blueprint $table) {
            $table->string('id_anuncio',25);
            $table->string('id_ficha',19)->unsigned();
            $table->foreign('id_ficha')->references('id_ficha')->on('tf_fichas')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('codi_autoriza')->nullable();
            $table->string('codi_anuncio',3)->nullable();
            $table->integer('nume_lados')->nullable();
            $table->decimal('area_autorizada',7,2)->nullable();
            $table->decimal('area_verificada',7,2)->nullable();
            $table->string('nume_expediente',10)->nullable();
            $table->string('nume_licencia',10)->nullable();
            $table->date('fecha_expedicion')->nullable();
            $table->date('fecha_vencimiento')->nullable();
            $table->string('descripcion',250)->nullable();
            $table->primary('id_anuncio');
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tf_autorizaciones_anuncios');
    }
};
