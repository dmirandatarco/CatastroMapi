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
        Schema::create('tf_institucion', function (Blueprint $table) {
            $table->string('id_institucion',6);
            $table->string('desc_institucion',50)->nullable(); 
            $table->string('dire_institucion',100)->nullable(); 
            $table->string('email',70)->nullable(); 
            $table->string('autoridad',100)->nullable(); 
            $table->string('cargo',50)->nullable(); 
            $table->date('fecha_registro')->nullable(); 
            $table->text('logo_institucion'); 
            $table->text('logo_catastro'); 
            $table->timestamps();            
            $table->primary('id_institucion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tf_institucion');
    }
};
