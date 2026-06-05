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
        Schema::create('tg_lotes', function (Blueprint $table) {
            $table->integer('gid');
            $table->integer('objectid');
            $table->decimal('shape_leng',20,10);
            $table->string('textstring',254);
            $table->decimal('textsize',20,10);
            $table->string('cod_lote',3);
            $table->text('geom');
            $table->string('cod_sector',2);
            $table->string('cod_mzna',3);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tg_lotes');
    }
};
