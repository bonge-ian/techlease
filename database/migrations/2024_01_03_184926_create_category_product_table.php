<?php

use App\Models\Category;
use App\Models\Product;
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
        Schema::create(table: 'category_product', callback: function (Blueprint $table) {
            //            $table->id();
            $table->foreignIdFor(model: Category::class, column: 'category_id')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(model: Product::class, column: 'product_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(table: 'category_product');
    }
};
