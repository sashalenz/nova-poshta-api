<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\InternetDocument\RequestData;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

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
