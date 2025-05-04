<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('order_items', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            $table->foreignId('product_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('tax_id')->nullable()->constrained()->nullOnDelete();
            $table->string('product_title');
            $table->unsignedInteger('amount');
            $table->decimal('tax_rate_value', 5)->unsigned()->default('0.00');
            $table->decimal('unit_price_net', 19, 4)->unsigned()->default('0.0000');
            $table->decimal('unit_price_tax', 19, 4)->unsigned()->default('0.0000');
            $table->decimal('unit_price_gross', 19, 4)->unsigned()->default('0.0000');
            $table->decimal('unit_final_price_net', 19, 4)->unsigned()->default('0.0000');
            $table->decimal('unit_final_price_tax', 19, 4)->unsigned()->default('0.0000');
            $table->decimal('unit_final_price_gross', 19, 4)->unsigned()->default('0.0000');
            $table->decimal('total_price_net', 19, 4)->unsigned()->default('0.0000');
            $table->decimal('total_price_tax', 19, 4)->unsigned()->default('0.0000');
            $table->decimal('total_price_gross', 19, 4)->unsigned()->default('0.0000');
            $table->decimal('discount_gross', 19, 4)->unsigned()->default('0.0000');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
