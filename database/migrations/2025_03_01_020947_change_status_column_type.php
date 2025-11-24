<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('attendances', function (Blueprint $table) {
            // まず、型変更をするためのSQLを実行（PostgreSQL向け）
            DB::statement('ALTER TABLE attendances ALTER COLUMN status TYPE INTEGER USING status::INTEGER');
        });
    }

    public function down(): void
    {
        Schema::table('attendances', function (Blueprint $table) {
            // もとに戻す場合は、文字列型に変換
            DB::statement('ALTER TABLE attendances ALTER COLUMN status TYPE VARCHAR(255)');
        });
    }
};
