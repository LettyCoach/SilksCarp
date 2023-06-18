<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('source_user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('target_user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('money_amount')->default(0);
            $table->integer('type')->default(0);
            $table->integer('store_state')->default(0);
            $table->string('destination', 512)->default('');
            $table->timestamp('trade_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trades');
    }
};