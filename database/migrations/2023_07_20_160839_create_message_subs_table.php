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
        Schema::create('message_subs', function (Blueprint $table) {
            $table->id();
            $table->string('title', 1024)->default('');
            $table->text('content')->default('');
            $table->integer('type')->default(0);
            $table->foreignId('message_id')->constrained('messages')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('parent_id')->nullable()->constrained('message_subs');
            $table->timestamp('read_date')->nullable()->default('2000-01-01 00:00:00');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message_subs');
    }
};