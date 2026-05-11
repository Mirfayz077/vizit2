<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hero_sections', function (Blueprint $table) {
            $table->id();
            $table->string('specialist_name', 120);
            $table->string('eyebrow', 160)->nullable();
            $table->string('headline', 180);
            $table->text('bio');
            $table->string('hero_image')->nullable();
            $table->string('primary_cta_label', 80);
            $table->string('primary_cta_url');
            $table->string('secondary_cta_label', 80);
            $table->string('secondary_cta_url');
            $table->string('tertiary_cta_label', 80);
            $table->string('tertiary_cta_url');
            $table->string('achievement_one_value', 40);
            $table->string('achievement_one_label', 120);
            $table->string('achievement_two_value', 40);
            $table->string('achievement_two_label', 120);
            $table->string('achievement_three_value', 40);
            $table->string('achievement_three_label', 120);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hero_sections');
    }
};
