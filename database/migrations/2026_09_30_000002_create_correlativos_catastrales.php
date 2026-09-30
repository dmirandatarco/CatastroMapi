<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('correlativos_catastrales', function (Blueprint $table) {
            $table->unsignedInteger('anio')->primary();
            $table->unsignedBigInteger('ultimo')->default(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('correlativos_catastrales');
    }
};
