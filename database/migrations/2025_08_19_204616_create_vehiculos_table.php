<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id');
            $table->string('tipo'); // carro, moto, bicicleta
            $table->string('placa')->nullable();
            $table->timestamp('fecha_ingreso')->nullable();
            $table->timestamp('fecha_salida')->nullable();
            $table->boolean('autorizado')->default(false);
            $table->timestamps();

            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('vehiculos');
    }
};
