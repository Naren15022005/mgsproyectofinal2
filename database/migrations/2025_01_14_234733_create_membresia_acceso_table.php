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
        Schema::create('membresia_acceso', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('membresia_id');
            $table->unsignedBigInteger('acceso_id');
            $table->timestamps();

            $table->foreign('membresia_id')->references('id')->on('membresias')->onDelete('cascade');
            $table->foreign('acceso_id')->references('id')->on('opciones_de_acceso')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membresia_acceso');
    }
};
