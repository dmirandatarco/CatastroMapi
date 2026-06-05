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
        Schema::create('tf_servicios_basicos', function (Blueprint $table) {
            $table->string('id_ficha', 19)->unsigned();
            $table->foreign('id_ficha')->references('id_ficha')->on('tf_fichas')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('luz')->nullable();
            $table->integer('agua')->nullable();
            $table->integer('telefono')->nullable();
            $table->integer('desague')->nullable();
            $table->integer('gas')->nullable();
            $table->integer('internet')->nullable();
            $table->integer('tvcable')->nullable();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tf_servicios_basicos');
    }
};
