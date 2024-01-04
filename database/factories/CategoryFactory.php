<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => ucwords($this->faker->unique()->words(nb: random_int(1, 4), asText: true)),
            'order' => $this->faker->optional()->randomDigit(),
            //			'parent_id',
        ];
    }
}
