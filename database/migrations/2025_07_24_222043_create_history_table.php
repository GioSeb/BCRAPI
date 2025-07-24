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
        Schema::create('history', function (Blueprint $table) {
            $table->id(); // ID único para cada registro
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // ID del usuario que hizo la consulta
            $table->string('cuit', 11); // El CUIT consultado
            $table->timestamps(); // Crea las columnas created_at y updated_at automáticamente
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history');
    }
};
