<?php

use App\Models\Brand;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(table: 'products', callback: function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(model: Brand::class)->constrained()->cascadeOnDelete();
            $table->string(column: 'title');
            $table->string(column: 'slug')->unique();
            $table->string(column: 'currency')->default(value: 'KES');
            $table->unsignedInteger(column: 'price');
            $table->text(column: 'description');
            $table->text(column: 'box_contents');
            $table->text(column: 'specs');
            $table->dateTime(column: 'live_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(table: 'products');
    }
};
