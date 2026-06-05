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
        Schema::create('tf_vias', function (Blueprint $table) {
            $table->string('id_via',12);
            $table->string('nomb_via',100);
            $table->string('tipo_via',5);
            $table->string('codi_via',6)->unique();
            $table->string('id_ubi_geo',6);
            $table->date('fecha_via')->nullable();            
            $table->string('estado',1);

            $table->primary('id_via');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tf_vias');
    }
};
