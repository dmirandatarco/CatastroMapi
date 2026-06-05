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
        Schema::create('tf_documento_posesion', function (Blueprint $table) {
            $table->string('id_ficha',19)->unsigned();
            $table->foreign('id_ficha')->references('id_ficha')->on('tf_fichas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('pru_ob1',1)->nullable();
            $table->string('pru_ob2',1)->nullable();
            $table->string('pru_ob3',1)->nullable();
            $table->string('pru_comp1',2)->nullable();
            $table->string('pru_comp2',2)->nullable();
            $table->string('pru_comp3',2)->nullable();
            $table->string('pru_comp4',2)->nullable();
            $table->string('pru_comp5',2)->nullable();
            $table->string('pru_comp6',2)->nullable();
            $table->string('pru_comp7',2)->nullable();
            $table->string('pru_comp8',2)->nullable();
            $table->string('pru_comp9',2)->nullable();
            $table->string('pru_comp10',2)->nullable();
            $table->string('pru_comp11',2)->nullable();
            $table->string('pru_comp12',2)->nullable();
            $table->string('pru_comp13',2)->nullable();
            $table->string('pru_comp14',2)->nullable();
            $table->string('pru_comp15',2)->nullable();
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tf_documento_posesion');
    }
};
