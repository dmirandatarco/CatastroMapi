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
        Schema::create('tf_tablas', function (Blueprint $table) {
            $table->string('id_tabla',3);  
            $table->string('desc_tabla',50)->nullable();  
            $table->integer('ultimo_codigo')->nullable();
            $table->primary('id_tabla');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tf_tablas');
    }
};
