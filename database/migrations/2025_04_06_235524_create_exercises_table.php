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
        Schema::create('exercises', function (Blueprint $table) {
            $table->id(); // ID autoincremental
            $table->string('programa'); // Nombre del programa
            $table->string('ejercicio'); // Nombre del ejercicio
            $table->integer('series'); // Número de series
            $table->integer('repeticiones'); // Número de repeticiones
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercises');
    }
};