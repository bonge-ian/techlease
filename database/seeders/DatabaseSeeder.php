<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	public function run(): void
	{
		// should follow this order.
		$this->call(class: [
			UserSeeder::class,
			CategorySeeder::class,
			BrandSeeder::class,
			ProductSeeder::class,
			CategoryProductSeeder::class,
			ProductVariationSeeder::class,
			ProductVariationRentalPeriodSeeder::class,
			StockSeeder::class,
		]);
	}
}
