<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembresiaOpcionAccesoTable extends Migration
{
    public function up()
    {
        Schema::create('membresia_opcion_acceso', function (Blueprint $table) {
            $table->id();
            $table->foreignId('membresia_id')->constrained('tipos_de_membresia')->onDelete('cascade');
            $table->foreignId('opcion_acceso_id')->constrained('opciones_de_acceso')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('membresia_opcion_acceso');
    }
}
