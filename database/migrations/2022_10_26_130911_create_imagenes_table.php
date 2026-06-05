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
        Schema::create('imagenes', function (Blueprint $table) {
            $table->id();
            $table->string('imagenfachada')->nullable();
            $table->string('imagenmapa')->nullable();
            $table->string('id_lote', 19)->unsigned();
            $table->foreign('id_lote')->references('id_lote')->on('tf_lotes');
            $table->bigInteger('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id_usuario')->on('tf_usuarios')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imagenes');
    }
};
