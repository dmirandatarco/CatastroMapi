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
        Schema::create('tf_construcciones', function (Blueprint $table) {
            $table->string('id_construccion', 25);
            $table->string('id_ficha', 19)->unsigned();
            $table->foreign('id_ficha')->references('id_ficha')->on('tf_fichas')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('codi_construccion')->nullable();
            $table->string('nume_piso', 2)->nullable();
            $table->date('fecha')->nullable();
            $table->string('mep', 2)->nullable();
            $table->string('ecs', 2)->nullable();
            $table->string('ecc', 2)->nullable();
            $table->string('estr_muro_col', 1)->nullable();
            $table->string('estr_techo', 1)->nullable();
            $table->string('acab_piso', 1)->nullable();
            $table->string('acab_puerta_ven', 1)->nullable();
            $table->string('acab_revest', 1)->nullable();
            $table->string('acab_bano', 1)->nullable();
            $table->string('inst_elect_sanita', 1)->nullable();
            $table->decimal('area_declarada', 8, 2)->nullable();
            $table->decimal('area_verificada', 8, 2)->nullable();
            $table->string('uca', 2)->nullable();
            $table->string('bloque', 2)->nullable();            
            $table->primary('id_construccion');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tf_construcciones');
    }
};
