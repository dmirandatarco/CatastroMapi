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
        Schema::create('generar_certificados', function (Blueprint $table) {
            $table->id();
            $table->string('id_uni_cat', 23)->unsigned();
            $table->string('dc', 1)->nullable();
            $table->decimal('area_declarada', 7, 2)->nullable();
            $table->decimal('area_verificada', 7, 2)->nullable();
            $table->decimal('porc_bc_terr_legal', 7, 2)->nullable();
            $table->decimal('porc_bc_terr_fisc', 7, 2)->nullable();
            $table->string('clasificacion', 4)->nullable();
            $table->string('codi_uso', 6)->unsigned();
            $table->string('tipo_edificacion', 15)->nullable();
            $table->string('cont_en', 2)->nullable();
            $table->string('fren_campo', 20)->nullable();
            $table->string('fren_colinda_campo', 20)->nullable();
            $table->string('dere_campo', 20)->nullable();
            $table->string('dere_colinda_campo', 20)->nullable();
            $table->string('izqu_campo', 20)->nullable();
            $table->string('izqu_colinda_campo', 20)->nullable();
            $table->string('fond_campo', 20)->nullable();
            $table->string('fond_colinda_campo', 20)->nullable();
            $table->text('nombresolicitud')->nullable();
            $table->text('observaciones')->nullable();
            $table->string('id_ficha', 19)->unsigned();
            $table->date('fecha_emision');
            $table->bigInteger('id_usuario')->unsigned();
            $table->foreign('id_usuario')
                  ->references('id_usuario')
                  ->on('tf_usuarios')
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
        Schema::dropIfExists('generar_certificados');
    }
};
