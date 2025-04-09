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
        Schema::create('users_programas', function (Blueprint $table) {
            $table->id(); // ID autoincremental
            $table->string('name'); // Nombre del usuario
            $table->string('email')->unique(); // Correo electrónico único
            $table->string('programa'); // Nombre del programa
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_programas');
    }
};