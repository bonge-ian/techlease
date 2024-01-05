<?php

use App\Models\Product;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(table: 'product_variations', callback: static function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(model: Product::class)->constrained()->cascadeOnDelete();
            $table->string(column: 'title');
            $table->string(column: 'type')->comment(comment: 'Can be color,size,memory,weight etc'); // color,size,
            $table->string(column: 'sku')->nullable();
            $table->unsignedBigInteger(column: 'parent_id')->nullable()->index();
            $table->smallInteger(column: 'order')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(table: 'product_variations');
    }
};
