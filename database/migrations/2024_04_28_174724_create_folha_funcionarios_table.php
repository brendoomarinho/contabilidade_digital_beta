<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('folha_funcionarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->boolean('atd')->default(0);
            $table->string('nome', 75);
            $table->string('cpf', 14);
            $table->date('dt_admissao');
            $table->string('cargo', 50);
            $table->string('jornada', 20);
            $table->unsignedDecimal('salario', 10, 2);
            $table->string('telefone', 20);
            $table->string('modalidade', 25);
            $table->json('doc_anexo');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('folha_funcionarios');
    }
};



