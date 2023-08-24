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
        Schema::create('money', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('cardNum')->default('');
            $table->string('cardType')->default('');
            $table->string('period')->default('');
            $table->string('secord')->default('');
            $table->string('bankName')->default('');
            $table->string('accountNum')->default('');
            $table->string('pointName')->default('');
            $table->string('pointNum')->default('');
            $table->string('amount')->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('money');
    }
};
