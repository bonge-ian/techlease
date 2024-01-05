<?php

namespace App\Models;

use App\Casts\AsBrickMoney;
use App\Enums\RentalPeriodType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductVariationRentalPeriod extends Model
{
    use HasFactory;

    protected $attributes = [
        'currency' => 'KES',
    ];

    protected $fillable = [
        'period',
        'price',
        'currency',
        'duration',
    ];

    protected $casts = [
        'duration' => 'integer',
        'price' => AsBrickMoney::class,
        'period' => RentalPeriodType::class,
    ];

    public function variation(): BelongsTo
    {
        return $this->belongsTo(related: ProductVariation::class, foreignKey: 'product_variation_id');
    }

    protected function rentalPeriod(): Attribute
    {
        return Attribute::get(static fn (mixed $value, array $attributes): mixed => str(string: $attributes['period'])->plural(count: $attributes['duration']));
    }
}
