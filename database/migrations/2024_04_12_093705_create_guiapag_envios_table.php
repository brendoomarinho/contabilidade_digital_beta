<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('guiapag_envios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('competencia_id');
            $table->unsignedBigInteger('title_id');
            $table->decimal('valor', 10, 2);
            $table->date('dt_venc');
            $table->integer('rtf');
            $table->string('doc_anexo');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('competencia_id')->references('id')->on('competencias');
            $table->foreign('title_id')->references('id')->on('guiapag_titles');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('guiapag_envios');
    }
};
