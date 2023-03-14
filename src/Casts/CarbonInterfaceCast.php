<?php

namespace Sashalenz\NovaPoshtaApi\Casts;

use Carbon\Carbon;
use DateTimeZone;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Exceptions\CannotCastDate;
use Spatie\LaravelData\Support\DataProperty;

final class CarbonInterfaceCast implements Cast
{
    public function __construct(
        protected null|string|array $format = null,
        protected ?string $setTimeZone = null,
        protected ?string $timeZone = null
    ) {
    }

    /**
     * @throws CannotCastDate
     */
    public function cast(DataProperty $property, mixed $value, array $context): ?Carbon
    {
        $formats = collect($this->format ?? config('data.date_format'));

        if (is_array($value) && array_key_exists('date', $value)) {
            $this->timeZone = $value['timezone'];
            $value = $value['date'];
        }

        if ($value === '') {
            return null;
        }

        $datetime = $formats
            ->map(fn (string $format) => rescue(fn () => Carbon::createFromFormat(
                $format,
                $value,
                isset($this->timeZone) ? new DateTimeZone($this->timeZone) : null
            ), report: false))
            ->first(fn ($value) => (bool) $value);

        if ($this->setTimeZone) {
            return $datetime->setTimezone(new DateTimeZone($this->setTimeZone));
        }

        return $datetime;
    }
}
