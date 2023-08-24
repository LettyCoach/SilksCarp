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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('post')->default('');
            $table->string('prefecture')->default('');
            $table->string('city')->default('');
            $table->string('street')->default('');
            $table->string('building')->default('');
            $table->string('phone')->default('');
            $table->string('gender')->default('');
            $table->string('birth')->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
