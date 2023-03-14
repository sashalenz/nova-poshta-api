<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\InternetDocument\RequestData;

use Sashalenz\NovaPoshtaApi\Enums\CargoType;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapOutputName(StudlyCaseMapper::class)]
class RedeliveryCalculateData extends Data
{
    public function __construct(
        public CargoType $cargoType,
        public string $amount,
    ) {
    }
}
