<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('inquiries', function (Blueprint $table) {
            $table->string('business_niche', 120)->nullable()->after('phone');
            $table->string('platform', 40)->nullable()->after('preferred_contact');
            $table->string('goal', 80)->nullable()->after('platform');
            $table->text('note')->nullable()->after('project_summary');
        });
    }

    public function down(): void
    {
        Schema::table('inquiries', function (Blueprint $table) {
            $table->dropColumn(['business_niche', 'platform', 'goal', 'note']);
        });
    }
};
