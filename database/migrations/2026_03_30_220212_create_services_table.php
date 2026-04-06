<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();

            // Relación: cada servicio pertenece a una categoría
            $table->foreignId('category_id')
                ->constrained('service_categories')
                ->onDelete('cascade');

            $table->string('name');                    // Nombre del servicio
            $table->string('image')->nullable();       // Ruta de imagen
            $table->integer('duration');               // Minutos
            $table->decimal('price', 8, 2);            // Precio
            $table->text('description')->nullable();   // Descripción
            $table->boolean('status')->default(true);  // Activo/inactivo

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};