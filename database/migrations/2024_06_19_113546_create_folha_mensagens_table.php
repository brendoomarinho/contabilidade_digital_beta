<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('folha_mensagens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('folha_id');
            $table->boolean('atd')->default(false);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('user_admin_id');
            $table->unsignedBigInteger('remetente_id');
            $table->text('mensagem');
            $table->string('doc_anexo')->nullable();
            $table->timestamps();
            $table->foreign('folha_id')->references('id')->on('folha_pagamentos');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('user_admin_id')->references('id')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('folha_mensagens');
    }
};




