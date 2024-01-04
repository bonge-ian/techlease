<?php

namespace App\Models;

use App\Casts\AsBrickMoney;
use Laravel\Scout\Searchable;
use App\Models\Concerns\HasSlug;
use Illuminate\Database\Eloquent\Model;
use App\Models\Concerns\HasThumb100X100;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;
    use HasSlug;
    use Searchable;
    use HasThumb100X100;
    use InteractsWithMedia;

    protected $fillable = [
        'slug',
        'title',
        'price',
        'specs',
        'live_at',
        'currency',
        'description',
        'box_contents',
    ];

    protected $casts = [
        'live_at' => 'datetime',
        'price' => AsBrickMoney::class,
    ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(related: Brand::class, foreignKey: 'brand_id');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(
            related: Category::class,
            table: 'category_product',
            foreignPivotKey: 'product_id',
            relatedPivotKey: 'category_id',
        );
    }

    public function variations(): HasMany
    {
        return $this->hasMany(related: ProductVariation::class, foreignKey: 'product_id');
    }

    public function rentalPeriods(): MorphMany
    {
        return $this->morphMany(related: ProductVariationRentalPeriod::class, name: 'rentable');
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->thumbnailConversion();
    }

    public function toSearchableArray(): array
    {
        return [
            'id' => (int) $this->id,
            'slug' => $this->slug,
            'title' => $this->title,
            'price' => (int) $this->price->getMinorAmount()->toInt(),
            'brand' => (array) $this->brand->only(['name', 'slug']),
            'category_ids' => $this->categories->pluck('id')->toArray(),
            ...$this->variations->groupBy('type')
                ->mapWithKeys(static fn ($variation, $key) => [
                    $key => $variation->pluck('title'),
                ])
                ->toArray(),
        ];
    }
}
