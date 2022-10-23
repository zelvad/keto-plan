<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('traffic', function (Blueprint $table): void {
            $table->text('url')
                ->after('click_id')
                ->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('traffic', function (Blueprint $table): void {
            $table->dropColumn('url');
        });
    }
};
