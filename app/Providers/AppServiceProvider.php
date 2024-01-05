<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductVariation;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

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
