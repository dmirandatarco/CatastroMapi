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
        Schema::create('tf_licencias', function (Blueprint $table) {
            $table->id();
            $table->string('nroexpediente');
            $table->date('fecha_emision');
            $table->date('fecha_vencimiento');
            $table->string('nrolicencia',255)->nullable();
            $table->string('administrado1',255);
            $table->string('administrado2',255)->nullable();
            $table->string('propietario',50)->nullable();
            $table->string('tipolicencia',255);
            $table->string('uso',255);
            $table->string('zonificacion',255);
            $table->string('alturapisos')->nullable();
            $table->string('alturametros',6,2)->nullable();
            $table->string('departamento',255);
            $table->string('provincia',255);
            $table->string('distrito',255);
            $table->string('haburbana',255)->nullable();
            $table->string('mzna',25)->nullable();
            $table->string('lote',25)->nullable();
            $table->string('sublote',25)->nullable();
            $table->string('calle',25)->nullable();
            $table->string('nro',25)->nullable();
            $table->string('interior',25)->nullable();
            $table->decimal('areatechada',7,2)->nullable();
            $table->decimal('valorobra',11,2)->nullable();
            $table->string('pisosautorizados',255)->nullable();
            $table->integer('nrosotano')->nullable();
            $table->integer('semisotano')->nullable();
            $table->integer('azotea')->nullable();
            $table->string('calificacion',255)->nullable();
            $table->text('dictamen');
            $table->text('licencia');
            $table->text('responsable')->nullable();
            $table->text('codresponsable')->nullable();
            $table->decimal('pagotramite',11,2)->nullable();
            $table->string('recibo',255)->nullable();
            $table->date('fecha_recibo')->nullable();
            $table->text('observacion')->nullable();
            $table->text('recomendaciones')->nullable();
            $table->string('estado',10)->default("1");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tf_licencias');
    }
};
