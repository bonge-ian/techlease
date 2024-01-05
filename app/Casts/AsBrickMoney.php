<?php

namespace App\Casts;

use Brick\Money\Money;
use Brick\Math\Exception\MathException;
use Illuminate\Database\Eloquent\Model;
use Brick\Math\Exception\NumberFormatException;
use Brick\Money\Exception\UnknownCurrencyException;
use Brick\Math\Exception\RoundingNecessaryException;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class AsBrickMoney implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  array<string, mixed>  $attributes
     * @return mixed
     *
     * @throws NumberFormatException
     * @throws RoundingNecessaryException
     * @throws UnknownCurrencyException
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): Money
    {
        return Money::ofMinor(minorAmount: $value, currency: data_get(target: $attributes, key: 'currency', default: 'KES'));
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  array<string, mixed>  $attributes
     *
     * @throws MathException
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        if (!$value instanceof Money) {
            return $value;
        }

        return $value->getMinorAmount()->toInt();
    }
}
