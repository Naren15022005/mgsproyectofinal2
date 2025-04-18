<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiposDeMembresiaTable extends Migration
{
    public function up()
    {
        Schema::create('tipos_de_membresia', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipos_de_membresia');
    }
}
