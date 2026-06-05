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
        Schema::create('titular_certificados', function (Blueprint $table) {
            $table->id();
            $table->string('nume_doc', 17)->nullable();
            $table->string('tipo_doc', 2)->nullable();
            $table->string('tipo_persona', 1)->nullable();
            $table->string('nombres', 150)->nullable();
            $table->string('ape_paterno', 50)->nullable();
            $table->string('ape_materno', 50)->nullable();
            $table->string('tipo_persona_juridica', 2)->nullable();
            $table->string('tipo_funcion', 1)->nullable();
            $table->string('nregistro', 7)->nullable();
            $table->string('razon_social', 100)->nullable();
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
        Schema::dropIfExists('titular_certificados');
    }
};
