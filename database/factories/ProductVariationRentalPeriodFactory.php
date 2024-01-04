<?php

namespace Database\Factories;

use App\Enums\RentalPeriodType;
use App\Models\ProductVariationRentalPeriod;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ProductVariationRentalPeriod>
 */
class ProductVariationRentalPeriodFactory extends Factory
{
    public function definition(): array
    {
        return [
            'period' => $this->faker->randomElement(array: RentalPeriodType::cases()),
            'duration' => $this->faker->randomDigit(),
            'price' => $this->faker->numberBetween(int1: 1_000, int2: 9_999_999),
        ];
    }
}
