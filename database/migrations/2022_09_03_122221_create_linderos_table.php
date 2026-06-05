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
        Schema::create('tf_linderos', function (Blueprint $table) {
            $table->string('id_ficha',19)->unsigned();
            $table->foreign('id_ficha')->references('id_ficha')->on('tf_fichas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('fren_campo',200)->nullable();
            $table->string('fren_titulo',200)->nullable();
            $table->string('fren_colinda_campo',200)->nullable();
            $table->string('fren_colinda_titulo',200)->nullable();
            $table->string('dere_campo',200)->nullable();
            $table->string('dere_titulo',200)->nullable();
            $table->string('dere_colinda_campo',200)->nullable();
            $table->string('dere_colinda_titulo',200)->nullable();
            $table->string('izqu_campo',200)->nullable();
            $table->string('izqu_titulo',200)->nullable();
            $table->string('izqu_colinda_campo',200)->nullable();
            $table->string('izqu_colinda_titulo',200)->nullable();
            $table->string('fond_titulo',200)->nullable();
            $table->string('fond_campo',200)->nullable();
            $table->string('fond_colinda_campo',200)->nullable();
            $table->string('fond_colinda_titulo',200)->nullable();
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tf_linderos');
    }
};
