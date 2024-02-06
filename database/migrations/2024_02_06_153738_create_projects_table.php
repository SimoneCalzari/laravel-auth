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
            $table->text('description');
            $table->string('slug', 100);
            $table->string('tecnologies_stack', 50)->nullable();
            $table->boolean('is_frontend')->default(false);
            $table->boolean('is_backend')->default(false);
            $table->boolean('is_monolith')->default(false);

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
