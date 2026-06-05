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
        Schema::create('tf_instalaciones', function (Blueprint $table) {
            $table->string('id_instalacion', 24);
            $table->string('id_ficha', 19)->unsigned();
            $table->foreign('id_ficha')->references('id_ficha')->on('tf_fichas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('codi_instalacion', 2)->unsigned();
            $table->foreign('codi_instalacion')->references('codi_instalacion')->on('tf_codigos_instalaciones')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('codi_obra')->nullable();
            $table->date('fecha')->nullable();
            $table->string('mep', 2)->nullable();
            $table->string('ecs', 2)->nullable();
            $table->string('ecc', 2)->nullable();
            $table->decimal('dime_largo', 7, 2)->nullable();
            $table->decimal('dime_ancho', 7, 2)->nullable();
            $table->decimal('dime_alto', 7, 2)->nullable();
            $table->decimal('prod_total', 7, 2)->nullable();
            $table->string('uni_med', 2)->nullable();
            $table->string('uca', 2)->nullable();            
            $table->primary('id_instalacion');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tf_instalaciones');
    }
};
