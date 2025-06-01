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
        Schema::create('livros', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('titulo');
            $table->text('sinopse');
            $table->unsignedBigInteger('autor_id');
            $table->foreign('autor_id')->references('id')->on('autores')->onDelete('cascade');
            $table->unsignedBigInteger('genero_id')->nullable();
            $table->foreign('genero_id')->references('id')->on('generos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livros');
    }
};
