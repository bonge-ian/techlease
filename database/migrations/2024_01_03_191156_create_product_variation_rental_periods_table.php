<?php

use App\Enums\RentalPeriodType;
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
        Schema::create(table: 'product_variation_rental_periods', callback: function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(model: ProductVariation::class)->constrained()->cascadeOnDelete();
            $table->string(column: 'duration');
            $table->string(column: 'period')->default(value: RentalPeriodType::MONTH->value);
            $table->string(column: 'price')->nullable();
            $table->string(column: 'currency')->default(value: "KES");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(table: 'rental_periods');
    }
};
