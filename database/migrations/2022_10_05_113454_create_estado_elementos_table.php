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
        Schema::create('tf_estado_elemento', function (Blueprint $table) {
            $table->string('id_ficha',19)->unsigned();
            $table->foreign('id_ficha')->references('id_ficha')->on('tf_fichas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('cimientos',1)->nullable();
            $table->string('muros',1)->nullable();
            $table->string('pisos',1)->nullable();
            $table->string('techos',1)->nullable();
            $table->string('pilastras',1)->nullable();
            $table->string('revestimiento',1)->nullable();
            $table->string('balcones',1)->nullable();
            $table->string('puertas',1)->nullable();
            $table->string('ventanas',1)->nullable();
            $table->string('rejas',1)->nullable();
            $table->string('otros',1)->nullable();
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tf_estado_elemento');
    }
};
