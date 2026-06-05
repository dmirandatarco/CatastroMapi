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
        Schema::create('tf_edificaciones', function (Blueprint $table) {
            $table->string('id_edificacion', 16);
            $table->string('id_lote', 14)->unsigned();
            $table->foreign('id_lote')->references('id_lote')->on('tf_lotes')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('codi_edificacion', 3);
            $table->string('tipo_edificacion', 15)->nullable();
            $table->string('nomb_edificacion', 15)->nullable();
            $table->string('clasificacion', 4)->nullable();
            $table->primary('id_edificacion');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tf_edificaciones');
    }
};
