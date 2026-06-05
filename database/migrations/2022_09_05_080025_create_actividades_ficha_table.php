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
        Schema::create('tf_autorizaciones_funcionamiento', function (Blueprint $table) {
            $table->string('codi_actividad',6)->unsigned();
            $table->foreign('codi_actividad')->references('codi_actividad')->on('tf_actividades')->onDelete('cascade')->onUpdate('cascade');
            $table->string('id_ficha',19)->unsigned();
            $table->foreign('id_ficha')->references('id_ficha')->on('tf_fichas')->onDelete('cascade')->onUpdate('cascade');
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tf_autorizaciones_funcionamiento');
    }
};
