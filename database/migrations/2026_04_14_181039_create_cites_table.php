<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cites', function (Blueprint $table) {
            $table->id();

            // Relaciones
            $table->foreignId('client_id')
                ->constrained('clients')
                ->onDelete('cascade');

            $table->foreignId('employee_id')
                ->constrained('employees')
                ->onDelete('cascade');

            $table->foreignId('service_id')
                ->constrained('services')
                ->onDelete('cascade');

            // Fecha y horas
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');

            // Estado
            $table->enum('status', [
                'pending',
                'confirmed',
                'completed',
                'cancelled'
            ])->default('pending');

            // Notas
            $table->text('notes')->nullable();

            $table->timestamps();

            // 🔥 CLAVE: evitar citas duplicadas en el mismo horario
            $table->unique(['employee_id', 'date', 'start_time']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cites');
    }
};