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
        Schema::create('musica', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('cantante');
            $table->string('ruta_archivo'); // Guardamos la ruta del storage, no el BLOB
            $table->foreignId('subido_por')->nullable()->constrained('usuarios')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('musica');
    }
};
