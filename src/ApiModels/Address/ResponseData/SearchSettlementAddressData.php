<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\Address\ResponseData;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapInputName(StudlyCaseMapper::class)]
final class SearchSettlementAddressData extends Data
{
    public function __construct(
        public readonly string $present,
        public readonly int $warehouses,
        public readonly string $mainDescription,
        public readonly string $area,
        public readonly string $region,
        public readonly string $settlementTypeCode,
        public readonly string $ref,
        public readonly string $deliveryCity,
        public readonly bool $addressDeliveryAllowed,
        public readonly bool $streetsAvailability,
        public readonly string $parentRegionTypes,
        public readonly string $parentRegionCode,
        public readonly string $regionTypes,
        public readonly string $regionTypesCode
    ) {
    }
}
