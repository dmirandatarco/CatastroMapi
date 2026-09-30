<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        foreach (['generar_certificados', 'generar_numeracions'] as $name) {
            Schema::table($name, function (Blueprint $table) {
                $table->json('documento')->nullable();
                $table->string('numero_documento', 60)->nullable()->unique();
            });
        }
    }

    public function down()
    {
        foreach (['generar_certificados', 'generar_numeracions'] as $name) {
            Schema::table($name, function (Blueprint $table) {
                $table->dropUnique(['numero_documento']);
                $table->dropColumn(['documento', 'numero_documento']);
            });
        }
    }
};
