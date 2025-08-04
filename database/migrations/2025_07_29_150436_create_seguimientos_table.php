<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('seguimientos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('cuit', 11);
            $table->string('denominacion');
            $table->integer('last_known_situation')->nullable();
            $table->json('last_known_cheques')->nullable();
            $table->timestamps();


            $table->unique(['user_id', 'cuit']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seguimientos');
    }
};
