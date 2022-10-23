<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('traffic', function (Blueprint $table): void {
            $table->string('id_user')
                ->comment('tracker')
                ->after('click_id');

            $table->string('pay_action')
                ->after('click_id');
        });
    }

    public function down(): void
    {
        Schema::table('traffic', function (Blueprint $table): void {
            $table->dropColumn(['id_user', 'pay_action']);
        });
    }
};
