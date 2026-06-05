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
        Schema::create('tf_vias_hab_urba', function (Blueprint $table) {
            $table->string('id_via', 12)->unsigned();
            $table->foreign('id_via')
            ->references('id_via')
            ->on('tf_vias')
            ->onDelete('cascade') 
            ->onUpdate('cascade');        
            $table->string('id_hab_urba', 10)->unsigned();
            $table->foreign('id_hab_urba')
            ->references('id_hab_urba')
            ->on('tf_hab_urbana')
            ->onDelete('cascade') 
            ->onUpdate('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tf_vias_hab_urba');
    }
};
