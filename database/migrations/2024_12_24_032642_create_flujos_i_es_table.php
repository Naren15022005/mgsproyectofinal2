<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlujosIESTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('flujos_i_es', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->decimal('monto', 10, 2);
            $table->text('descripcion')->nullable();
            $table->date('fecha');
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('usuario_id');
            $table->timestamps();

            $table->foreign('categoria_id')->references('id')->on('categoria_flujos_i_es')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flujos_i_es');
    }
}