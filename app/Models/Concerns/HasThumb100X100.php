<?php

namespace App\Models\Concerns;

use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\Conversions\Conversion;

trait HasThumb100X100
{
    protected function thumbnailConversion(bool $is_queued = false): void
    {
        $this
            ->addMediaConversion(name: 'thumb100x100')
            ->width(width: 100)
            ->height(height: 100)
            ->fit(fit: Fit::Crop, desiredWidth: 100, desiredHeight: 100)
            ->sharpen(amount: 10)
            ->when(
                value: $is_queued,
                callback: static fn (Conversion $conversion) => $conversion->nonQueued(),
            );
    }
}
