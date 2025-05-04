<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->nullable()->constrained('users', 'id')->nullOnDelete();
            $table->string('status', 30);
            $table->string('email', 254)->nullable();
            $table->decimal('items_net', 19, 4)->unsigned()->default('0.0000');
            $table->decimal('items_tax', 19, 4)->unsigned()->default('0.0000');
            $table->decimal('items_gross', 19, 4)->unsigned()->default('0.0000');
            $table->decimal('total_net', 19, 4)->unsigned()->default('0.0000');
            $table->decimal('total_tax', 19, 4)->unsigned()->default('0.0000');
            $table->decimal('total_gross', 19, 4)->unsigned()->default('0.0000');
            $table->decimal('discount_gross', 19, 4)->unsigned()->default('0.0000');
            $table->decimal('shipping_cost', 19, 4)->unsigned()->default('0.0000');

            $table->string('shipping_driver', 255)->nullable();
            $table->json('shipping_data')->nullable();
            $table->string('billing_driver', 255)->nullable();
            $table->json('billing_data')->nullable();
//
//            $table->string('shipping_method', 255)->nullable();
//            $table->string('shipping_street', 255)->nullable();
//            $table->string('shipping_building_nr', 255)->nullable();
//            $table->string('shipping_apartment_nr', 255)->nullable();
//            $table->string('shipping_postcode', 255)->nullable();
//            $table->string('shipping_city', 255)->nullable();
//            $table->string('shipping_region', 255)->nullable();
//            $table->string('shipping_first_line', 255)->nullable();
//            $table->string('shipping_second_line', 255)->nullable();
//            $table->string('shipping_email', 254)->nullable();
//            $table->string('shipping_phone', 20)->nullable();
//            $table->string('billing_method')->nullable();
//
            $table->text('customer_note')->nullable();
            $table->date('ordered_at')->nullable();
            $table->date('realization_at')->nullable();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
