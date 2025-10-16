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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('profile_id')
                ->constrained() 
                ->onDelete('cascade');
                
            $table->string('title');
            $table->text('description');
            $table->string('role');
            $table->date('started_at');
            $table->date('finished_at')->nullable();
            $table->integer('team_size')->nullable();
            $table->boolean('status')->default(true); 
            $table->boolean('is_favorite')->default(false);// Si destacado o no

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
