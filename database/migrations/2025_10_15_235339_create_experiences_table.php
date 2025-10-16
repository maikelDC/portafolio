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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('profile_id')
            ->constrained()
            ->onDelete('cascade');

            $table->string('position'); // cargo en la empresa
            $table->string('company'); // nombre de la empresa
            $table->date('start_date'); // fecha de inicio
            $table->date('end_date')->nullable(); // fecha de fin
            $table->string('location')->nullable(); // ubicación de la empresa
            $table->string('type')->nullable(); // tipo de empleo (presencial, remoto, híbrido)
            $table->text('description')->nullable(); // descripción de la experiencia

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
