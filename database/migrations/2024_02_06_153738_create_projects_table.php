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

            $table->string('title', 50)->unique();
            $table->text('description')->nullable();
            $table->string('slug', 100);
            $table->string('tecnologies_stack', 50)->nullable();
            $table->boolean('is_frontend')->nullable();
            $table->boolean('is_backend')->nullable();
            $table->boolean('is_monolith')->nullable();

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
