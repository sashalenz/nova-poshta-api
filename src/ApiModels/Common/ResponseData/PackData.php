<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\Common\ResponseData;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapInputName(StudlyCaseMapper::class)]
final class PackData extends Data
{
    public function __construct(
        public string $ref,
        public string $description,
        public string $descriptionRu,
        public string $length,
        public string $width,
        public string $height,
        public string $volumetricWeight,
        public string $typeOfPacking,
        public int $packagingForPlace
    ) {
    }
}
