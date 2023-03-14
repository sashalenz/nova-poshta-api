<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\Address\ResponseData;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapInputName(StudlyCaseMapper::class)]
final class StreetData extends Data
{
    public function __construct(
        public string $description,
        public string $ref,
        public string $streetsTypeRef,
        public string $streetsType,
    ) {
    }
}
