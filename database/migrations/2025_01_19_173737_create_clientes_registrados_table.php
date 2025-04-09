<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesRegistradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes_registrados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('membresia_id');
            $table->unsignedBigInteger('tipo_membresia_id');
            $table->date('fecha_inicio');
            $table->integer('duracion');
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('membresia_id')->references('id')->on('membresias')->onDelete('cascade');
            $table->foreign('tipo_membresia_id')->references('id')->on('tipos_de_membresia')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes_registrados');
    }
}