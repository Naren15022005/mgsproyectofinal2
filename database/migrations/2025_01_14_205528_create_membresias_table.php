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
        Schema::create('membresias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_membresia_id');
            $table->unsignedBigInteger('acceso_incluido_id')->nullable();
            $table->decimal('precio', 8, 2);
            $table->integer('duracion'); // Duración en días
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            $table->timestamps();

            // Definimos las claves foráneas
            $table->foreign('tipo_membresia_id')->references('id')->on('tipos_de_membresia')->onDelete('cascade');
            $table->foreign('acceso_incluido_id')->references('id')->on('opciones_de_acceso')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membresias');
    }
};
