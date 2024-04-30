<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('movimento_envios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('competencia_id');
            $table->unsignedBigInteger('title_id');
            $table->boolean('atd')->default(0);
            $table->string('doc_anexo');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('competencia_id')->references('id')->on('competencias');
            $table->foreign('title_id')->references('id')->on('movimento_titles');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('movimento_envios');
    }
};
