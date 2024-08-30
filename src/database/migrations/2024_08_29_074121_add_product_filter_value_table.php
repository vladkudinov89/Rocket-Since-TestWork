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
        Schema::create('product_filter_value', function (Blueprint $table) {
            $table->id();

            $table->foreignId('product_id')
                ->references('id')
                ->on('products')
                ->cascadeOnDelete();

            $table->foreignId('product_filter_id')
                ->references('id')
                ->on('product_filter')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_filter_value');
    }
};
