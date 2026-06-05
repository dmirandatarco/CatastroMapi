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
        Schema::create('tf_usuarios', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->integer('codi_usuario');
            $table->string('usuario',50)->unique();
            $table->string('password');   
            $table->string('nombres',50);
            $table->string('ape_paterno',50);
            $table->string('ape_materno',50);
            $table->string('email',50)->nullable();
            $table->date('fecha_creacion')->nullable();
            $table->date('fecha_cese')->nullable();
            $table->string('imagen',200)->nullable();
            $table->string('estado',1);      
            $table->string('session_id')->nullable();
  
            
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tf_usuarios');
    }
};
