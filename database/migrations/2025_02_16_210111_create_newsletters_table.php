<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    public function up(): void
    {
        Schema::create('newsletters', static function (Blueprint $table) {
            $table->id();
            $table->string('email', 254);
            $table->foreignId('user_id')->nullable()->constrained();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('newsletters');
    }
};
