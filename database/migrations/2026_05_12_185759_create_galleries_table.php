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
        Schema::create('galleries', function (Blueprint $table) {

            $table->id();

            // Relación con servicio
            $table->foreignId('service_id')
                ->constrained('services')
                ->onDelete('cascade');

            // Título del trabajo
            $table->string('title');

            // Imagen
            $table->string('image');

            // Descripción opcional
            $table->text('description')->nullable();

            // Activo/inactivo
            $table->boolean('status')->default(true);

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};