<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('withdrawal_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('title', 512)->default('');
            $table->integer('money_all')->default(0);
            $table->integer('money_real')->default(0);
            $table->string('description', 2048)->default('');
            $table->integer('type')->default(1);
            $table->integer('state')->default(0);
            $table->timestamp('trade_date')->nullable()->default('2000-01-01 00:00:00');
            $table->timestamp('expected_date')->nullable()->default('2000-01-01 00:00:00');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('withdrawal_infos');
    }
};
