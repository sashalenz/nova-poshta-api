<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\Common\RequestData;

use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\Validation\DateFormat;
use Spatie\LaravelData\Attributes\Validation\Uuid;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;
use Spatie\LaravelData\Optional;

#[MapOutputName(StudlyCaseMapper::class)]
final class GetTimeIntervalsRequest extends Data
{
    public function __construct(
        #[Uuid]
        public string $recipientCityRef,
        #[DateFormat('d-m-Y')]
        public Optional|string $dateTime,
    ) {
    }
}
