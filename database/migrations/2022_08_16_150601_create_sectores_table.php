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
        Schema::create('tf_sectores', function (Blueprint $table) {
            $table->string('id_sector', 8);
            $table->string('id_ubi_geo', 6)->unsigned();            
            $table->foreign('id_ubi_geo')
                  ->references('id_ubi_geo')
                  ->on('tf_ubigeo')
                  ->onDelete('cascade') 
                  ->onUpdate('cascade');            
            $table->string('codi_sector', 2)->unique();
            $table->string('nomb_sector', 20)->nullable();
            $table->integer('fichaindividual')->nullable()->default(0);
            $table->integer('fichacotitular')->nullable()->default(0);
            $table->integer('fichaeconomica')->nullable()->default(0);
            $table->integer('fichabiencomun')->nullable()->default(0);
            $table->integer('fichacultural')->nullable()->default(0);
            $table->integer('ficharural')->nullable()->default(0);
            $table->string('estado', 1);
            $table->primary('id_sector');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sectores');
    }
};
