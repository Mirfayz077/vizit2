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
            $table->string('title', 120);
            $table->string('slug', 140)->unique();
            $table->string('label', 80)->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('theme', 30)->default('bronze');
            $table->string('layout', 30)->default('centered');
            $table->unsignedTinyInteger('row')->default(1);
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index(['is_active', 'row', 'sort_order']);
            $table->index('is_featured');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
