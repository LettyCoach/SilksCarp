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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 256)->default("");
            $table->string('images', 512)->default("[]");
            $table->integer('price')->default(0);
            $table->string('description', 512)->default("");
            $table->integer('cost')->default(0);
            $table->string('supplier_url', 256)->default('');
            $table->text('other');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
