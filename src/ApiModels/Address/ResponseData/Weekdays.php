<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\Address\ResponseData;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapInputName(StudlyCaseMapper::class)]
final class Weekdays extends Data
{
    public function __construct(
        public string $monday,
        public string $tuesday,
        public string $wednesday,
        public string $thursday,
        public string $friday,
        public string $saturday,
        public string $sunday,
    ) {
    }
}
