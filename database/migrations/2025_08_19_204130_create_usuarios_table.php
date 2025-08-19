<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('documento')->unique();
            $table->string('correo')->unique();
            $table->string('telefono')->nullable();
            $table->string('password');
            $table->enum('rol', ['aprendiz', 'instructor', 'visitante', 'vigilante', 'administrador']);
            $table->string('ficha')->nullable(); // solo para aprendices
            $table->string('centro_formacion')->nullable();
            $table->date('fin_actividades')->nullable(); // solo visitantes
            $table->string('ocupacion')->nullable(); // solo visitantes
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('usuarios');
    }
};
