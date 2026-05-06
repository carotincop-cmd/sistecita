<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');                    // Nombre de la categoría
            $table->text('description')->nullable();   // Descripción opcional
            $table->string('image')->nullable(); 
            $table->boolean('status')->default(true);  // Activo/inactivo
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_categories');
    }
};