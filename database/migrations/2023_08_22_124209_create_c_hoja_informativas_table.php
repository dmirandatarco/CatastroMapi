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
        Schema::create('c_hoja_informativas', function (Blueprint $table) {
            $table->id();
            $table->string('id_ficha', 19)->unsigned();
            $table->foreign('id_ficha')
                  ->references('id_ficha')
                  ->on('tf_fichas')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->text('ubicacion');
            $table->date('fecha_generacion')->nullable();
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
        Schema::dropIfExists('c_hoja_informativas');
    }
};
