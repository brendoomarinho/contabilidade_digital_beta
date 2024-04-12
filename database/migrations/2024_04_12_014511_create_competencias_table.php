<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('competencias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mes_id');
            $table->unsignedBigInteger('ano_id');
            $table->timestamps();
            $table->foreign('mes_id')->references('id')->on('competencia_meses');
            $table->foreign('ano_id')->references('id')->on('competencia_anos');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('competencias');
    }
};
