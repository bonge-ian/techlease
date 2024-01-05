<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Concerns\HasThumb100X100;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class ProductVariation extends Model
{
    use HasFactory;
    use HasRecursiveRelationships;
    use HasThumb100X100;
    use InteractsWithMedia;

    protected $fillable = [
        'sku',
        'type',
        'title',
        'order',
        'parent_id',
    ];

    protected $casts = [
        'order' => 'integer',
    ];

    protected static function booted(): void
    {
        static::creating(callback: static function (Model $model): void {
            $model->sku = str(string: $model->title)
                ->append(' ', $model->type)
                ->slug()
                ->limit(limit: 255, end: '')
                ->trim(characters: '-');
        });
    }

    public function lowStock(): bool
    {
        return !$this->outOfStock() && $this->stockCount() <= 5;
    }

    public function outOfStock(): bool
    {
        return !$this->inStock();
    }

    public function inStock(): bool
    {
        return $this->stockCount() > 0;
    }

    public function stockCount(): int
    {
        return $this->descendantsAndSelf->sum(
            static fn (self $variation) => $variation->stocks->sum('amount'),
        );
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(related: Product::class, foreignKey: 'product_id');
    }

    public function rentalPeriods(): HasMany
    {
        return $this->hasMany(related: ProductVariationRentalPeriod::class, foreignKey: 'product_variation_id');
    }

    public function stocks(): HasMany
    {
        return $this->hasMany(related: Stock::class, foreignKey: 'product_variation_id');
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->thumbnailConversion();
    }

    //	public function registerMediaCollections(): void
    //	{
    //		$this->addMediaCollection('default')
    //			->useFallbackUrl(url: url('/storage/no-image.jpg'));
    //	}
}
