<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCajaDiaTable extends Migration
{
    public function up()
    {
        Schema::create('caja_dia', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->decimal('monto_inicial', 10, 2);
            $table->decimal('monto_final', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('caja_dia');
    }
}