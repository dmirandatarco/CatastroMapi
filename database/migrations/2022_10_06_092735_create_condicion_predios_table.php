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
        Schema::create('tf_condicion_predio', function (Blueprint $table) {
            $table->string('id_ficha',19)->unsigned();
            $table->foreign('id_ficha')->references('id_ficha')->on('tf_fichas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('cond_titular',2)->nullable();
            $table->date('fecha_ini')->nullable();
            $table->string('insc_rrpp',2)->nullable();
            $table->integer('num_part')->nullable();
            $table->date('fecha_insc')->nullable();
            $table->string('doc_propiedad',2)->nullable();
            $table->date('fecha_adq')->nullable();
        });        
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tf_condicion_predio');
    }
};
