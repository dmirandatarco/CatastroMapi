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
        Schema::create('tf_tablas_codigos', function (Blueprint $table) {
            $table->string('codigo', 10);
            $table->string('id_tabla', 3)->unsigned();
            $table->foreign('id_tabla')->references('id_tabla')->on('tf_tablas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('desc_codigo', 80)->nullable();
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tf_tablas_codigos');
    }
};
