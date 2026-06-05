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
        Schema::create('tf_manzanas', function (Blueprint $table) {
            $table->string('id_mzna', 11);            
            $table->string('id_sector', 8)->unsigned();            
            $table->foreign('id_sector')
            ->references('id_sector')
            ->on('tf_sectores')
            ->onDelete('cascade') 
            ->onUpdate('cascade');            
            $table->string('codi_mzna', 3);
            $table->string('nume_mzna', 15)->nullable();
            $table->string('estado', 1);            
            $table->primary('id_mzna');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tf_manzanas');
    }
};
