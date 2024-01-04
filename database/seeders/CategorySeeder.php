<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::factory()->count(count: 10)->create()->each(
            callback: fn (Category $parent) => $parent->children()
                ->saveMany(
                    models: Category::factory()
                        ->count(count: random_int(1, 5))
                        ->make()
                )
        );
    }
}
