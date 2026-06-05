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
        Schema::create('tf_ubigeo', function (Blueprint $table) {
            $table->string('id_ubi_geo',6);
            $table->string('nomb_ubigeo',100);
            $table->string('cuc_desde',8)->nullable();
            $table->string('cuc_hasta',8)->nullable();
            $table->string('ultimo_cuc',8)->nullable();
            $table->timestamps();

            $table->primary('id_ubi_geo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tf_ubigeo');
    }
};
