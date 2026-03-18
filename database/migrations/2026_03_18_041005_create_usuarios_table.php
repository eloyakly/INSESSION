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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->string('apellido', 50);
            $table->string('correo', 100)->unique();
            $table->string('clave'); // Para el Hash::make() de Laravel
            $table->string('foto')->default('default_user.webp');
            $table->string('frase', 100)->nullable();
            $table->integer('nivel')->default(0);
            $table->timestamps(); // Crea created_at y updated_at        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
