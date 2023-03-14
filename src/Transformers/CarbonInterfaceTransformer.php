<?php

namespace Sashalenz\NovaPoshtaApi\Transformers;

use DateTimeZone;
use Illuminate\Support\Arr;
use Spatie\LaravelData\Support\DataProperty;
use Spatie\LaravelData\Transformers\Transformer;

class CarbonInterfaceTransformer implements Transformer
{
    public function __construct(
        protected ?string $format = null,
        protected ?string $setTimeZone = null
    ) {
    }

    public function transform(DataProperty $property, mixed $value): string
    {
        [$format] = Arr::wrap($this->format ?? config('data.date_format'));

        if ($this->setTimeZone) {
            $value = (clone $value)->setTimezone(new DateTimeZone($this->setTimeZone));
        }

        return $value->format(ltrim($format, '!'));
    }
}
