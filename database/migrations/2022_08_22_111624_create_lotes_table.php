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
        Schema::create('tf_lotes', function (Blueprint $table) {
            $table->string('id_lote', 14);
            $table->string('id_mzna', 11)->unsigned();
            $table->foreign('id_mzna')->references('id_mzna')->on('tf_manzanas')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('codi_lote', 3);
            $table->string('id_hab_urba', 10)->nullable();
            $table->string('mzna_dist', 15)->nullable();
            $table->string('lote_dist', 15)->nullable();
            $table->string('sub_lote_dist', 6)->nullable();
            $table->string('estructuracion', 30)->nullable();
            $table->string('zonificacion', 100)->nullable();
            $table->string('cuc', 8)->nullable();
            $table->string('zona_dist', 15)->nullable();
            $table->primary('id_lote');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tf_lotes');
    }
};
