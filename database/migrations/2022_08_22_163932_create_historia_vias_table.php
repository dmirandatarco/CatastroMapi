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
        Schema::create('tf_historia_via', function (Blueprint $table) {
            $table->id('id_historia_via');
            $table->string('nomb_via_ant', 100);
            $table->date('fecha_his_via')->nullable();
            $table->string('id_via', 12)->unsigned();
            $table->foreign('id_via')->references('id_via')->on('tf_vias')->onDelete('cascade')->onUpdate('cascade');
            $table->string('activo', 1);
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tf_historia_via');
    }
};
