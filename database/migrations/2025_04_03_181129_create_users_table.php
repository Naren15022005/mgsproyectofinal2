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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nombre del usuario
            $table->string('email')->unique(); // Email único
            $table->timestamp('email_verified_at')->nullable(); // Verificación de email
            $table->string('password'); // Contraseña
            $table->foreignId('role_id')
                ->default(4) // ID del rol 'cliente' (asegúrate de que este ID exista en la tabla roles)
                ->constrained('roles') // Relación con la tabla roles
                ->onDelete('cascade'); // Elimina usuarios si el rol asociado es eliminado
            $table->string('foto', 255)->nullable(); // Ruta de la foto del usuario
            $table->rememberToken(); // Token para "recordarme"
            $table->timestamps(); // Timestamps (created_at, updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};