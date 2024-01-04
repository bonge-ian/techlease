<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Model;

trait HasSlug
{
    public static function bootHasSlug(): void
    {
        static::creating(callback: static function (Model $model): void {
            $model->slug = str(string: ($model->name) ? $model->name : $model->title)->slug();
        });
    }
}
