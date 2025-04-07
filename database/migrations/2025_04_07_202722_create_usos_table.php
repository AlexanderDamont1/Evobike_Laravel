<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsosTable extends Migration
{
    public function up()
    {
        Schema::create('usos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pieza_id')->constrained()->onDelete('cascade');  // Relaciona con la tabla piezas
            $table->integer('cantidad_utilizada');
            $table->timestamp('fecha');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('usos');
    }
}
