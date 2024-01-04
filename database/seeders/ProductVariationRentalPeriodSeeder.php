<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductVariation;
use App\Models\ProductVariationRentalPeriod;

class ProductVariationRentalPeriodSeeder extends Seeder
{
    public function run(): void
    {
        if (!($query = ProductVariation::query())->count()) {
            return;
        }

        $query->eachById(callback: function (ProductVariation $variation): void {
            $variation->rentalPeriods()->saveMany(
                models: ProductVariationRentalPeriod::factory()->count(count: random_int(1, 4))->make()
            );
        });
    }
}
