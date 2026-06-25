<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('name');
            $table->string('category')->nullable();
            $table->string('year', 10)->nullable();
            $table->string('role')->nullable();
            $table->string('timeline')->nullable();
            $table->json('tools')->nullable();
            $table->text('problem_statement')->nullable();
            $table->text('solutions')->nullable();
            $table->string('hero_image', 1000)->nullable();
            $table->json('page_images')->nullable();
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
