<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use App\Models\Concerns\HasSlug;
use Illuminate\Database\Eloquent\Model;
use App\Models\Concerns\HasThumb100X100;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Brand extends Model
{
    use HasFactory;
    use HasSlug;
    use Searchable;
    use HasThumb100X100;
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'slug',
        'order',
    ];

    protected $casts = [

    ];

    public function products(): HasMany
    {
        return $this->hasMany(related: Product::class, foreignKey: 'product_id');
    }

    public function toSearchableArray(): array
    {
        return [
            'id' => (int) $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'order' => (int) $this->order,
        ];
    }

    public function registerAllMediaConversions(?Media $media = null): void
    {
        $this->thumbnailConversion();
    }
}
