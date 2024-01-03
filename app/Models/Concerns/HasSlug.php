<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Model;

trait HasSlug
{
    public static function bootHasSlug(): void
    {
        static::creating(static function (Model $model) {
            $model->slug = str(string: ($model->name) ? $model->name : $model->title)->slug();
        });
    }
}
