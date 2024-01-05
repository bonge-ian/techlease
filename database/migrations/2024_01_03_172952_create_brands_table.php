<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(table: 'brands', callback: static function (Blueprint $table) {
            $table->id();
            $table->string(column: 'name');
            $table->string(column: 'slug')->unique();
            $table->smallInteger(column: 'order')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(table: 'brands');
    }
};
