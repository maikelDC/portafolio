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
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('profile_id')
            ->constrained()
            ->onDelete('cascade');

            $table->string('title');
            $table->string('provider'); // e.g., organization or institution
            $table->string('type'); // e.g., curso, taller, seminario, certificación
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->text('description');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainings');
    }
};
