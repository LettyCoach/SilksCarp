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
        Schema::create('help_to_categories', function (Blueprint $table) {
            // $table->id();
            $table->foreignId("help_id")->constrained("helps")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("help_category_id")->constrained("help_categories")->onUpdate("cascade")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('help_to_categories');
    }
};