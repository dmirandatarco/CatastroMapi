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
        Schema::create('tf_uni_cat', function (Blueprint $table) {
            $table->string('id_uni_cat', 23);
            $table->string('id_lote', 16)->nullable();
            $table->string('id_edificacion')->unsigned();
            $table->foreign('id_edificacion')->references('id_edificacion')->on('tf_edificaciones')->onDelete('cascade')->onUpdate('cascade');
            $table->string('codi_entrada', 2)->nullable();
            $table->string('codi_piso', 2)->nullable();
            $table->string('codi_unidad', 3)->nullable();
            $table->string('tipo_interior', 2)->nullable();
            $table->string('cuc', 12)->nullable();
            $table->string('cuc_antecedente', 12)->nullable();
            $table->string('codi_hoja_catastral', 10)->nullable();
            $table->string('codi_pred_rentas', 15)->nullable();
            $table->string('nume_interior', 15)->nullable();
            $table->string('unid_acum_rentas', 15)->nullable();
            $table->string('codi_cont_rentas', 15)->nullable();
            $table->primary('id_uni_cat');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tf_uni_cat');
    }
};
