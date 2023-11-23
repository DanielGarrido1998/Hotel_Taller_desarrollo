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
        Schema::create('reserva', function (Blueprint $table) {
            $table->id('id_reserva');
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('numero_habitacion');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->foreign('id_cliente')->references('id_cliente')->on('cliente');
            $table->foreign('numero_habitacion')->references('numero_habitacion')->on('habitacion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserva');
    }
};
