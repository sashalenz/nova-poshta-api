<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\Address\ResponseData;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapInputName(StudlyCaseMapper::class)]
final class SettlementData extends Data
{
    public function __construct(
        public string $ref,
        public string $settlementType,
        public string $latitude,
        public string $longitude,
        public string $description,
        public string $descriptionTranslit,
        public string $settlementTypeDescription,
        public string $settlementTypeDescriptionTranslit,
        public string $region,
        public string $regionsDescription,
        public string $regionsDescriptionTranslit,
        public string $area,
        public string $areaDescription,
        public string $areaDescriptionTranslit,
        public string $index1,
        public string $index2,
        public string $indexCOATSU1,
        public bool $delivery1,
        public bool $delivery2,
        public bool $delivery3,
        public bool $delivery4,
        public bool $delivery5,
        public bool $delivery6,
        public bool $delivery7,
        public bool $specialCashCheck,
        public bool $warehouse,
    ) {
    }
}
