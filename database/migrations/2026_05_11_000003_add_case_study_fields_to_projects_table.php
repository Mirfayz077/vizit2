<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('client_niche', 120)->nullable()->after('label');
            $table->text('before_state')->nullable()->after('description');
            $table->text('work_done')->nullable()->after('before_state');
            $table->string('result', 140)->nullable()->after('work_done');
            $table->string('platform', 80)->nullable()->after('result');
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['client_niche', 'before_state', 'work_done', 'result', 'platform']);
        });
    }
};
