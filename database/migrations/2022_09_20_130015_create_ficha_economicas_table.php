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
        Schema::create('tf_fichas_economicas', function (Blueprint $table) {
            $table->string('id_ficha',19)->unsigned();
            $table->foreign('id_ficha')->references('id_ficha')->on('tf_fichas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nomb_comercial',100)->nullable();
            $table->decimal('pred_area_autor',7,2)->nullable();
            $table->decimal('viap_area_autor',7,2)->nullable();
            $table->decimal('viap_area_verif',7,2)->nullable();
            $table->decimal('bc_area_autor',7,2)->nullable();
            $table->decimal('bc_area_verif',7,2)->nullable();
            $table->string('nume_expediente',10)->nullable();
            $table->string('nume_licencia',10)->nullable();
            $table->date('fecha_expedicion')->nullable();
            $table->date('fecha_vencimiento')->nullable();
            $table->date('inic_actividad')->nullable();
            $table->string('cond_declarante',2)->nullable();
            $table->string('esta_llenado',1)->nullable();
            $table->string('mantenimiento',2)->nullable();
            $table->string('docu_presentado',2)->nullable();
            $table->decimal('pred_area_verif',7,2)->nullable();
            $table->text('observaciones')->nullable();
            $table->string('nume_ficha',7)->nullable();
            $table->string('codigo_secuencial',250)->nullable();

        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tf_fichas_economicas');
    }
};
