<?php

namespace Database\Seeders;

use App\Models\Stock;
use Illuminate\Database\Seeder;
use App\Models\ProductVariation;

class StockSeeder extends Seeder
{
    public function run(): void
    {
        if (!($query = ProductVariation::query())->count()) {
            return;
        }

        $query->eachById(
            callback: static function (ProductVariation $variation): void {
                $variation->stocks()->saveMany(
                    models: ($initial_stocks = Stock::factory()->count(count: random_int(1, 3))->make())
                );

                $initial_stocks->each(
                    callback: static function (Stock $stock) use ($variation): void {
                        $variation->stocks()->saveMany(
                            models: Stock::factory()->count(count: random_int(1, 3))->make(attributes: [
                                'amount' => random_int(min(-$stock->amount, -$variation->stockCount()), $stock->amount),
                            ])
                        );
                    }
                );
            }
        );
    }
}
