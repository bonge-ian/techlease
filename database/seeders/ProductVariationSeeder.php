<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use App\Models\ProductVariation;

class ProductVariationSeeder extends Seeder
{
    public function run(): void
    {
        if (!($query = Product::query())->count()) {
            return;
        }

        $query->eachById(callback: function (Product $product): void {
            $product->variations()->saveMany(
                models: ($parents = ProductVariation::factory()->count(count: random_int(1, 4))->make())
            );

            $parents->each(callback: function (ProductVariation $variation) use ($product): void {
                $variation->children()->saveMany(
                    models: ProductVariation::factory()
                        ->count(count: random_int(1, 6))
                        ->make(attributes: ['product_id' => $product->id])
                );
            });
        });
    }
}
