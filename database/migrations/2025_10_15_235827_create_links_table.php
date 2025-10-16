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
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->string('label');// e.g., 'GitHub', 'Website' texto visible en el frontend
            $table->string('type')->nullable();// e.g., redes sociales, proyectos, imágenes, videos etc.

            $table->unsignedBigInteger('linkable_id');
            $table->string('linkable_type');

            $table->timestamps();

            $table->index(['linkable_id', 'linkable_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('links');
    }
};
