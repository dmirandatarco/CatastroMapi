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
        Schema::create('tf_puertas', function (Blueprint $table) {
            $table->string('id_puerta', 16);
            $table->string('id_lote', 14)->unsigned();
            $table->foreign('id_lote')->references('id_lote')->on('tf_lotes')->onDelete('cascade')->onUpdate('cascade');
            $table->string('codi_puerta', 2)->nullable();
            $table->string('tipo_puerta', 1)->nullable();
            $table->string('nume_muni', 20)->nullable();
            $table->string('cond_nume', 2)->nullable();
            $table->string('id_via', 12)->unsigned();
            $table->foreign('id_via')->references('id_via')->on('tf_vias')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nume_certificacion', 10)->nullable();
            $table->primary('id_puerta');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tf_puertas');
    }
};
