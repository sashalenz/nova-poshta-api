<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\Common\ResponseData;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapInputName(StudlyCaseMapper::class)]
final class PalletData extends Data
{
    public function __construct(
        public string $ref,
        public string $description,
        public float $weight
    ) {
    }
}
