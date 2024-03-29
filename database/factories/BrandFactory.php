<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Brand>
 */
class BrandFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => ucwords($this->faker->unique()->words(nb: random_int(1, 3), asText: true)),
            'order' => $this->faker->optional()->randomDigit(),
        ];
    }
}
