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
        Schema::create('tf_documentos_adjuntos', function (Blueprint $table) {
            $table->string('id_doc', 21);
            $table->string('id_ficha', 19)->unsigned();
            $table->foreign('id_ficha')->references('id_ficha')->on('tf_fichas')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('codi_doc')->nullable();
            $table->string('tipo_doc', 2)->nullable();
            $table->string('nume_doc', 50)->nullable();
            $table->decimal('area_autorizada', 7, 2)->nullable();
            $table->date('fecha_doc')->nullable();
            $table->string('url_doc', 250)->nullable();
            $table->primary('id_doc');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tf_documentos_adjuntos');
    }
};
