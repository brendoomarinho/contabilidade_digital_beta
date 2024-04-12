<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('certidao_envios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('title_id');
            $table->string('doc_anexo');
            $table->date('dt_venc');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('title_id')->references('id')->on('certidao_titles');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('certidao_envios');
    }
};
