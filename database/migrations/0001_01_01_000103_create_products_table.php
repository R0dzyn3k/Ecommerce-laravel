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
        Schema::create('products', static function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->unique();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->string('ean', 48)->nullable();
            $table->string('sku', 60)->nullable();
            $table->string('mpn', 60)->nullable();
            $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('tax_id')->constrained()->restrictOnDelete();
            $table->foreignId('brand_id')->nullable()->constrained()->nullOnDelete();
            $table->decimal('price_gross', 19, 4)->unsigned()->default('0.0000');
            $table->decimal('discount_price', 19, 4)->nullable()->unsigned();
            $table->unsignedInteger('stock');
            $table->decimal('reviews_average', 2, 1)->unsigned()->default('0.0');
            $table->unsignedInteger('reviews_count')->default(0);

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
