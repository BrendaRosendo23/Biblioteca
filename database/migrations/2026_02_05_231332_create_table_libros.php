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
        // ===== TABLA: categorias =====
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255);
            $table->timestamps();
        });

        // ===== TABLA: libros =====
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 255);
            $table->string('isbn', 100);
            $table->string('autor', 255);
            $table->string('editorial', 250);
            $table->smallInteger('estatus')->default(0);

            // FK (crea la columna categoria_id y la relación)
            $table->foreignId('categoria_id')
                  ->constrained('categorias')
                  ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
        Schema::dropIfExists('categorias');
    }
};
