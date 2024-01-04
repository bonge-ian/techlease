<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'live_at' => $this->faker->dateTimeThisMonth('+ 30 days'),
            'price' => $this->faker->numberBetween(int1: 10_000, int2: 9_999_999),
            'specs' => $this->faker->sentences(nb: random_int(1, 5), asText: true),
            'title' => ucwords($this->faker->unique()->words(nb: random_int(1, 5), asText: true)),
            'description' => $this->faker->paragraphs(nb: random_int(1, 7), asText: true),
            'box_contents' => $this->faker->sentences(nb: random_int(1, 5), asText: true),
        ];
    }
}
