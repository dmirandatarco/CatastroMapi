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
        Schema::create('tf_ficha_rural', function (Blueprint $table) {
            $table->string('id_ficha',19)->unsigned();
            $table->foreign('id_ficha')->references('id_ficha')->on('tf_fichas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('cuc',15)->nullable();
            $table->string('codigo_hoja_catastral',15)->nullable();
            $table->string('codigo_contr_rentas',15)->nullable();
            $table->string('codigo_predial',15)->nullable();
            $table->string('unidad_organica',15)->nullable();
            $table->string('unidad_catastral',15)->nullable();
            $table->string('cod_pro',2)->nullable();
            $table->string('cod_dep',2)->nullable();
            $table->string('cod_dis',2)->nullable();
            $table->string('proy_cat',75)->nullable();
            $table->string('uni_terr',75)->nullable();
            $table->string('nomb_valle',75)->nullable();
            $table->string('nomb_sector',75)->nullable();
            $table->string('nomb_predio',75)->nullable();
            $table->string('num_foto',175)->nullable();
            $table->string('num_ortofoto',175)->nullable();
            $table->string('img_satelital',175)->nullable();
            $table->string('uca_ant',75)->nullable();
            $table->string('cord_este',75)->nullable();
            $table->string('cord_norte',75)->nullable();
            $table->string('datum',75)->nullable();
            $table->string('zona',75)->nullable();
            $table->string('codi_uso',2)->nullable();
            $table->string('clasi_uso',2)->nullable();
            $table->string('riego',2)->nullable();
            $table->string('derecho_agua',2)->nullable();
            $table->string('fuente_hidrica',2)->nullable();
            $table->string('cercania_rio',2)->nullable();
            $table->string('cumple_explotacion',2)->nullable();
            $table->string('llenada_intervension',2)->nullable();
            $table->text('observaciones')->nullable();
            $table->string('nume_ficha',7)->nullable();
            $table->string('zona_geografica',2)->nullable();
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tf_ficha_rural');
    }
};
