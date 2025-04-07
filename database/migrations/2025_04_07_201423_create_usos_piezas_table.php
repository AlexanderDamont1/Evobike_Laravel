<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

public function up()
{
    Schema::create('usos_piezas', function (Blueprint $table) {
        $table->id();
        $table->foreignId('pieza_id')->constrained()->onDelete('cascade');
        $table->integer('cantidad_usada');
        $table->string('departamento'); // mantenimiento, ensamble, etc.
        $table->text('comentario')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usos_piezas');
    }
};
