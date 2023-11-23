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
        Schema::create('administrador', function (Blueprint $table) {
            $table->integer('telefono');
            $table->string('contraseña');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_rol');
            //$table->rememberToken();

            $table->foreign('id_user')->references('id_user')->on('users');
            $table->foreign('id_rol')->references('id_rol')->on('rol');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
