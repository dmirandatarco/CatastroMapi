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
        Schema::create('tf_recap_edificio', function (Blueprint $table) {
            $table->string('id_ficha',19)->unsigned();
            $table->foreign('id_ficha')->references('id_ficha')->on('tf_fichas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('edificio',2)->nullable();
            $table->decimal('total_porcentaje',7,2)->nullable();
            $table->decimal('total_atc',7,2)->nullable();
            $table->decimal('total_acc',7,2)->nullable();
            $table->decimal('total_aoic',7,2)->nullable();
            $table->integer('id_recap')->nullable();
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tf_recap_edificio');
    }
};
