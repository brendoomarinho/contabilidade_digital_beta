<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('folha_recrutamentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('funcionario_id');
            $table->integer('etapa');
            $table->boolean('atd')->default(0);
            $table->string('exame_admissao')->nullable();
            $table->string('contrato_original')->nullable();
            $table->string('contrato_assinado')->nullable();
            $table->string('ficha_cadastral')->nullable();
            $table->string('rescisao_motivo')->nullable();
            $table->date('dt_aviso')->nullable();
            $table->string('reducao_jornada')->nullable();
            $table->text('relato')->nullable();
            $table->string('aviso_original')->nullable();
            $table->string('aviso_assinado')->nullable();
            $table->string('exame_demissao')->nullable();
            $table->string('termo_rescisao_original')->nullable();
            $table->string('termo_rescisao_assinado')->nullable();
            $table->timestamps();
            $table->foreign('funcionario_id')->references('id')->on('folha_funcionarios');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('folha_recrutamentos');
    }
};
