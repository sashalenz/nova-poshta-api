<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\Address\ResponseData;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapInputName(StudlyCaseMapper::class)]
final class CityData extends Data
{
    public function __construct(
        public string $description,
        public string $ref,
        public bool $delivery1,
        public bool $delivery2,
        public bool $delivery3,
        public bool $delivery4,
        public bool $delivery5,
        public bool $delivery6,
        public bool $delivery7,
        public string $area,
        public string $settlementType,
        public bool $isBranch,
        public bool $preventEntryNewStreetsUser,
        public int $cityID,
        public string $settlementTypeDescription,
        public bool $specialCashCheck,
        public string $areaDescription,
    ) {
    }
}
