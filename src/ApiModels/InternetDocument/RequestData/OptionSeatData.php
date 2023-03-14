<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\InternetDocument\RequestData;

use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;
use Spatie\LaravelData\Optional;

#[MapOutputName(StudlyCaseMapper::class)]
final class OptionSeatData extends Data
{
    public function __construct(
        public string $weight,
        public string $volumetricLength,
        public string $volumetricWidth,
        public string $volumetricHeight,
        public Optional|string $volumetricVolume,
        public Optional|bool $specialCargo,
        public Optional|string $packRef,
    ) {
    }
}
