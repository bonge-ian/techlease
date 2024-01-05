<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryProductSeeder extends Seeder
{
    public function run(): void
    {
        if (!Category::query()->count() && !Product::query()->count()) {
            return;
        }

        $categories = Category::query()->get(columns: 'id');

        Product::query()->eachById(callback: static function (Product $product) use ($categories) {
            $product->categories()->saveMany(
                models: $categories->random(number: random_int(1, $categories->count()))
            );
        });
    }
}
