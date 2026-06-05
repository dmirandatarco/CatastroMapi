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
        Schema::create('tf_recap_bbcc', function (Blueprint $table) {
            $table->string('id_ficha', 19)->unsigned();
            $table->foreign('id_ficha')->references('id_ficha')->on('tf_fichas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('edifica', 2)->nullable();
            $table->string('entrada', 2)->nullable();
            $table->string('nume_piso', 2)->nullable();
            $table->string('unidad', 3)->nullable();
            $table->decimal('porcentaje', 7, 2)->nullable();
            $table->decimal('atc', 7, 2)->nullable();
            $table->decimal('acc', 7, 2)->nullable();
            $table->decimal('aoic', 7, 2)->nullable();
            $table->integer('nume_registro')->nullable();        
            $table->primary(['id_ficha', 'nume_registro']);
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tf_recap_bbcc');
    }
};
