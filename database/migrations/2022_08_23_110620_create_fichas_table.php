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
        Schema::create('tf_fichas', function (Blueprint $table) {
            $table->string('id_ficha', 19);
            $table->string('tipo_ficha', 2)->nullable();
            $table->string('nume_ficha', 7)->nullable();
            $table->string('id_lote', 14)->nullable();
            $table->string('dc', 1)->nullable();
            $table->string('nume_ficha_lote', 9)->nullable();
            $table->string('id_declarante', 21)->unsigned()->nullable();
            $table->foreign('id_declarante')->references('id_persona')->on('tf_personas')->onDelete('cascade')->onUpdate('cascade');
            $table->date('fecha_declarante')->nullable();
            $table->string('id_supervisor', 21)->unsigned()->nullable();
            $table->foreign('id_supervisor')->references('id_persona')->on('tf_personas')->onDelete('cascade')->onUpdate('cascade');
            $table->date('fecha_supervision')->nullable();
            $table->string('id_tecnico', 21)->unsigned()->nullable();
            $table->foreign('id_tecnico')->references('id_persona')->on('tf_personas')->onDelete('cascade')->onUpdate('cascade');
            $table->date('fecha_levantamiento')->nullable();
            $table->string('id_verificador', 21)->unsigned()->nullable();
            $table->foreign('id_verificador')->references('id_persona')->on('tf_personas')->onDelete('cascade')->onUpdate('cascade');
            $table->date('fecha_verificacion')->nullable();
            $table->string('nume_registro', 10)->nullable();
            $table->string('id_uni_cat', 23)->unsigned();
            $table->foreign('id_uni_cat')->references('id_uni_cat')->on('tf_uni_cat')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id_usuario')->on('tf_usuarios')->onDelete('cascade')->onUpdate('cascade');
            $table->datetime('fecha_grabado')->nullable();
            $table->string('activo', 1)->nullable();
            $table->primary('id_ficha');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tf_fichas');
    }
};
