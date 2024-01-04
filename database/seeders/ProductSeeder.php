<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::factory()->count(count: 100)
            ->sequence(fn (Sequence $sequence) => [
                'brand_id' => Brand::query()->pluck(column: 'id')->random(),
            ])
            ->create();
    }
}
