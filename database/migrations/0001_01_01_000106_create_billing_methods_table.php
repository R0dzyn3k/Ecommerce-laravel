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
        Schema::create('shipping_methods', static function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active')->default(true);
            $table->string('name', 255);
            $table->string('driver', 255);
            $table->decimal('cost', 19, 4)->unsigned()->default(0);
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taxes');
    }
};
