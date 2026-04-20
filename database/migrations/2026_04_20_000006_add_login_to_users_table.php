<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('login')->nullable()->after('name');
        });

        DB::table('users')
            ->orderBy('id')
            ->get()
            ->each(function (object $user): void {
                $base = Str::slug((string) ($user->name ?: ''), separator: '_');

                if ($base === '' && filled($user->email)) {
                    $base = Str::before((string) $user->email, '@');
                }

                if ($base === '') {
                    $base = 'user_'.$user->id;
                }

                $candidate = $base;
                $counter = 2;

                while (DB::table('users')->where('login', $candidate)->where('id', '!=', $user->id)->exists()) {
                    $candidate = $base.'_'.$counter;
                    $counter++;
                }

                DB::table('users')
                    ->where('id', $user->id)
                    ->update(['login' => $candidate]);
            });

        Schema::table('users', function (Blueprint $table) {
            $table->unique('login');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique(['login']);
            $table->dropColumn('login');
        });
    }
};
