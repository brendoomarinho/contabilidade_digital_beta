<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('folha_pagamentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->boolean('atd')->default(false);
            $table->boolean('retificador')->default(false);
            $table->unsignedBigInteger('ano_id');
            $table->unsignedBigInteger('mes_id');
            $table->boolean('recebido')->default(false);
            $table->dateTime('dt_retificador')->nullable();
            $table->decimal('valor', 10, 2)->nullable();
            $table->string('extrato')->nullable();
            $table->string('recibos')->nullable();
            $table->string('anexo_resumo');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('ano_id')->references('id')->on('competencia_meses');
            $table->foreign('mes_id')->references('id')->on('competencia_anos');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('folha_pagamentos');
    }
};
