<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\InternetDocument\ResponseData;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapInputName(StudlyCaseMapper::class)]
final class OriginalGeoData extends Data
{
    public function __construct(
        public string $recipientAddressName,
        public string $recipientArea,
        public string $recipientAreaRegions,
        public string $recipientCityName,
        public string $recipientFlat,
        public string $recipientHouse,
    ) {
    }
}
