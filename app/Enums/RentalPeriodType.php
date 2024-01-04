<?php

namespace App\Enums;

use Illuminate\Contracts\Support\DeferringDisplayableValue;

enum RentalPeriodType: string implements DeferringDisplayableValue
{
    case DAY = 'day';

    case WEEK = 'week';

    case MONTH = 'month';

    public function resolveDisplayableValue()
    {
        return str(string: $this->value)->headline();
    }
}
