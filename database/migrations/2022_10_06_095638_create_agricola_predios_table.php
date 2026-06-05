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
        Schema::create('tf_agricola_predio', function (Blueprint $table) {
            $table->string('id_ficha', 19)->unsigned();
            $table->foreign('id_ficha')->references('id_ficha')->on('tf_fichas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('tipo_agricola', 2)->nullable();
            $table->integer('area_agricola')->nullable();
            $table->string('descripcion_agricola', 20)->nullable();
            $table->string('grupo_agricola_campo', 1)->nullable();
            $table->string('clase_agricola_campo', 2)->nullable();
            $table->integer('area_agricola_campo')->nullable();
            $table->string('grupo_agricola_tierras', 1)->nullable();
            $table->string('clase_agricola_tierras', 2)->nullable();
            $table->integer('area_agricola_tierras')->nullable();
            $table->integer('numero_plantas')->nullable();
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tf_agricola_predio');
    }
};
