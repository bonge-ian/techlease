<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariation;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configurePolymorphicRelations();
    }

    protected function configurePolymorphicRelations(): void
    {
        Relation::morphMap(map: [
            'brand' => Brand::class,
            'product' => Product::class,
            'category' => Category::class,
            'product-variation' => ProductVariation::class,
        ]);
    }
}
