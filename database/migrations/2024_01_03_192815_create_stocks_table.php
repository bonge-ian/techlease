<?php

use App\Models\ProductVariation;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(table: 'stocks', callback: static function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(model: ProductVariation::class, column: 'product_variation_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->integer(column: 'amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(table: 'stocks');
    }
};
