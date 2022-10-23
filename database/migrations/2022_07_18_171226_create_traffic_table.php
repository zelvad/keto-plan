<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('traffic', function (Blueprint $table): void {
            $table->id();
            $table->string('account_id');
            $table->string('click_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('traffic');
    }
};
