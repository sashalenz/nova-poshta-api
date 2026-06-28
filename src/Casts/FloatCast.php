<?php

namespace Sashalenz\NovaPoshtaApi\Casts;

use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\Creation\CreationContext;
use Spatie\LaravelData\Support\DataProperty;

/**
 * Nova Poshta returns numeric fields (costs, weights) as strings and sends an
 * empty string when the value is absent (e.g. a waybill with no COD). A bare
 * `float` property then throws a TypeError on `""` because it is not a coercible
 * numeric string. Coerce numeric values to float and treat empty/non-numeric
 * input as 0.0.
 */
final class FloatCast implements Cast
{
    public function cast(DataProperty $property, mixed $value, array $properties, CreationContext $context): float
    {
        return is_numeric($value) ? (float) $value : 0.0;
    }
}
