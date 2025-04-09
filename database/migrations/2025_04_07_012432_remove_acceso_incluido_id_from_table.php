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
        Schema::table('membresias', function (Blueprint $table) {
            // Eliminar la relación foreign key primero
            $table->dropForeign(['acceso_incluido_id']);
            // Luego eliminar la columna
            $table->dropColumn('acceso_incluido_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('membresias', function (Blueprint $table) {
            $table->unsignedBigInteger('acceso_incluido_id')->nullable();
            $table->foreign('acceso_incluido_id')->references('id')->on('opciones_de_acceso')->onDelete('set null');
        });
    }
};