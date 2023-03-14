<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\Common\RequestData;

use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;
use Spatie\LaravelData\Optional;

#[MapOutputName(StudlyCaseMapper::class)]
final class GetPackListRequest extends Data
{
    public function __construct(
        public Optional|string $length,
        public Optional|string $width,
        public Optional|string $height,
        public Optional|string $volumetricWeight,
        public Optional|string $typeOfPacking,
    ) {
    }
}
