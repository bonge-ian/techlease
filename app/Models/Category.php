<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use App\Models\Concerns\HasSlug;
use Illuminate\Database\Eloquent\Model;
use App\Models\Concerns\HasThumb100X100;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Category extends Model
{
    use HasFactory;
    use HasRecursiveRelationships;
    use HasSlug;
    use HasThumb100X100;
    use InteractsWithMedia;
    use Searchable;

    protected $fillable = [
        'name',
        'slug',
        'order',
        'parent_id',
    ];

    protected $casts = [
        'order' => 'integer',
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(
            related: Product::class,
            table: 'category_product',
            foreignPivotKey: 'category_id',
            relatedPivotKey: 'product_id'
        );
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->thumbnailConversion();
        //		$this
        //			->addMediaConversion(name: 'thumb100x100')
        //			->width(width: 100)
        //			->height(height: 100)
        //			->fit(fit: Fit::Crop, desiredWidth: 100, desiredHeight: 100)
        //			->sharpen(amount: 10)
        //			->nonQueued();
    }

    public function toSearchableArray(): array
    {
        return [
            'id' => (int) $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'order' => (int) $this->order,
            'parent' => $this->parent?->only(['name', 'slug']),
            'children' => (array) $this->children->sortByDesc('order')
                ->transform(static fn ($child) => $child->only(['name', 'slug']))
                ->all(),
        ];
    }

    protected function caption(): Attribute
    {
        return Attribute::get(get: function (): ?string {
            if (!$this->children()->count()) {
                return null;
            }

            return $this->children()->pluck(column: 'name')->join(glue: ', ');
        });
    }
}
