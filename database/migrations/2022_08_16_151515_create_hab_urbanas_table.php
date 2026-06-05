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
        Schema::create('tf_hab_urbana', function (Blueprint $table) {
            $table->string('id_hab_urba', 10);
            $table->string('grup_urba', 100)->nullable();
            $table->string('tipo_hab_urba', 10)->nullable();
            $table->string('nomb_hab_urba', 100)->nullable();
            $table->string('codi_hab_urba', 4)->unique();
            $table->string('id_ubi_geo')->unsigned();
            $table->foreign('id_ubi_geo')
            ->references('id_ubi_geo')
            ->on('tf_ubigeo')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('estado', 1);                    
            $table->primary('id_hab_urba');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tf_hab_urbana');
    }
};
