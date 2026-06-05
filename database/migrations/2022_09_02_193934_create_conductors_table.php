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
        Schema::create('tf_conductores', function (Blueprint $table) {
            $table->string('id_ficha', 19)->unsigned();
            $table->foreign('id_ficha')->references('id_ficha')->on('tf_fichas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('id_persona', 21)->unsigned();
            $table->foreign('id_persona')->references('id_persona')->on('tf_personas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('fax', 10)->nullable();
            $table->string('telefono', 10)->nullable();
            $table->string('anexo', 5)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('cond_conductor', 18)->nullable();
            $table->string('nume_ruc', 11)->nullable();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tf_conductores');
    }
};
