<?php

namespace Database\Factories;

use App\Models\ProductVariation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ProductVariation>
 */
class ProductVariationFactory extends Factory
{
    public function definition(): array
    {
        return [
            //            'sku' => $this->faker->ean13(),
            'type' => $this->faker->randomElement($this->sampleVariations()),
            'title' => ucwords($this->faker->words(nb: random_int(1, 4), asText: true)),
            'order' => $this->faker->optional()->randomDigit(),
        ];
    }

    private function sampleVariations(): array
    {
        return [
            'Weight',
            'Color',
            'Size',
            'Memory',
            'Storage',
        ];
    }
}
