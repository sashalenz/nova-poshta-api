<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\Address\ResponseData;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapInputName(StudlyCaseMapper::class)]
final class SettlementStreetAddressData extends Data
{
    public function __construct(
        public string $settlementRef,
        public string $settlementStreetRef,
        public string $settlementStreetDescription,
        public string $present,
        public string $streetsType,
        public string $streetsTypeDescription,
        public Location $location,
        public string $settlementStreetDescriptionRu,
    ) {
    }
}
