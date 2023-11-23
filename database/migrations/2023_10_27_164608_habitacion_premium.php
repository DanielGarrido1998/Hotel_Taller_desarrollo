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
        Schema::create('habitacion_premium', function (Blueprint $table) {
            $table->id('id_h_premium');
            $table->decimal('valor', 10, 2);
            $table->unsignedBigInteger('numero_habitacion');
            $table->foreign('numero_habitacion')->references('numero_habitacion')->on('habitacion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habitacion_premium');
    }
};
