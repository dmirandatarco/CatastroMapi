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
        Schema::create('construccion_certificados', function (Blueprint $table) {
            $table->id();
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
            $table->bigInteger('certificado_id')->unsigned()->nullable();
            $table->foreign('certificado_id')
                  ->references('id')
                  ->on('generar_certificados')
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
        Schema::dropIfExists('construccion_certificados');
    }
};
