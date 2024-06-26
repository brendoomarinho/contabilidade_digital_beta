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
            $table->boolean('recebido')->default(false);
            $table->unsignedBigInteger('user_admin_id')->nullable();
            $table->boolean('retificador')->default(false);
            $table->unsignedBigInteger('ano_id');
            $table->unsignedBigInteger('mes_id');
            $table->dateTime('dt_retificador')->nullable();
            $table->decimal('valor', 10, 2)->nullable();
            $table->string('extrato')->nullable();
            $table->string('recibos')->nullable();
            $table->string('anexo_resumo');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('user_admin_id')->references('id')->on('users');
            $table->foreign('ano_id')->references('id')->on('competencia_anos');
            $table->foreign('mes_id')->references('id')->on('competencia_meses');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('folha_pagamentos');
    }
};
