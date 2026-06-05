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
        Schema::create('ubicacion_certificados', function (Blueprint $table) {
            $table->id();
            $table->string('codi_puerta', 2)->nullable();
            $table->string('tipo_puerta', 1)->nullable();
            $table->string('cuadra', 20)->nullable();
            $table->string('interior', 2)->nullable();
            $table->string('via_id')->unsigned()->nullable();
            $table->foreign('via_id')
                  ->references('id_via')
                  ->on('tf_vias')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->bigInteger('certificado_id')->unsigned()->nullable();
            $table->foreign('certificado_id')
                  ->references('id')
                  ->on('generar_numeracions')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ubicacion_certificados');
    }
};
