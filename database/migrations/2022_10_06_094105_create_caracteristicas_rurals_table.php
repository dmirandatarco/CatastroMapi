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
        Schema::create('tf_caracteristicas_rural', function (Blueprint $table) {
            $table->string('id_ficha',19)->unsigned();
            $table->foreign('id_ficha')->references('id_ficha')->on('tf_fichas')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('area_terreno',7,2)->nullable();
            $table->decimal('area_decl',7,2)->nullable();
            $table->string('vivienda',1)->nullable();
            $table->string('establo',1)->nullable();
            $table->string('corral',1)->nullable();
            $table->string('galpon',1)->nullable();
            $table->string('invernadero',1)->nullable();
            $table->string('reservorio',1)->nullable();
            $table->string('deposito',1)->nullable();
            $table->string('zona_arque',1)->nullable();
            $table->string('otros',1)->nullable();
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tf_caracteristicas_rural');
    }
};
