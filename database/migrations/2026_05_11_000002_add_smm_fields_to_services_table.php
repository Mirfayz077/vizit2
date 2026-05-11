<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('price')->nullable()->after('description');
            $table->string('icon', 60)->nullable()->after('price');
            $table->string('benefit')->nullable()->after('icon');
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['price', 'icon', 'benefit']);
        });
    }
};
