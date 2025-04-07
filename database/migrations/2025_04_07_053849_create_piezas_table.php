<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePiezasTable extends Migration
{
    public function up()
    {
        Schema::create('piezas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('codigo')->unique();  // El campo codigo
            $table->text('descripcion')->nullable();
            $table->integer('cantidad');
            $table->integer('limite_alerta')->default(5); // Para avisar cuando haya pocas piezas
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('piezas');
    }
}
