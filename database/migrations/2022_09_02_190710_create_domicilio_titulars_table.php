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
        Schema::create('tf_domicilio_titulares', function (Blueprint $table) {
            $table->string('id_ficha', 19)->unsigned();
            $table->foreign('id_ficha')->references('id_ficha')->on('tf_fichas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('id_persona', 21)->unsigned();
            $table->foreign('id_persona')->references('id_persona')->on('tf_personas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('codi_via', 6)->nullable();
            $table->string('tipo_via', 5)->nullable();
            $table->string('nomb_via', 100)->nullable();
            $table->string('nume_muni', 6)->nullable();
            $table->string('nomb_edificacion', 100)->nullable();
            $table->string('nume_interior', 5)->nullable();
            $table->string('codi_hab_urba', 4)->nullable();
            $table->string('nomb_hab_urba', 100)->nullable();
            $table->string('sector', 50)->nullable();
            $table->string('mzna', 5)->nullable();
            $table->string('lote', 5)->nullable();
            $table->string('sublote', 5)->nullable();
            $table->string('codi_dep', 2)->nullable();
            $table->string('codi_pro', 2)->nullable();
            $table->string('codi_dis', 2)->nullable();
            $table->string('ubicacion', 2)->nullable();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tf_domicilio_titulares');
    }
};
