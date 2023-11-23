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
        Schema::create('habitacion', function (Blueprint $table) {
            $table->id('numero_habitacion');
            $table->string('descripcion')->nullable();
            $table->integer('capacidad');
            $table->decimal('precio_por_noche', 10, 2);
            $table->unsignedBigInteger('id_tipo_habitacion');
            $table->string('estado')->nullable();
            $table->foreign('id_tipo_habitacion')->references('id_tipo_habitacion')->on('tipo_habitacion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habitacion');
    }
};
