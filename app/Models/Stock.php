<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
    ];

    protected $casts = [
        'amount' => 'integer',
    ];

    public function variation(): BelongsTo
    {
        return $this->belongsTo(related: ProductVariation::class, foreignKey: 'product_variation_id');
    }
}
