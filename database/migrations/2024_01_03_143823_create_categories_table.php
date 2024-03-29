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
        Schema::create(table: 'categories', callback: static function (Blueprint $table): void {
            $table->id();
            $table->string(column: 'name');
            $table->string(column: 'slug')->unique();
            $table->unsignedBigInteger(column: 'parent_id')->nullable();
            $table->smallInteger(column: 'order')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(table: 'categories');
    }
};
