<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\InternetDocument\ResponseData;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapInputName(StudlyCaseMapper::class)]
final class DocumentPriceData extends Data
{
    public function __construct(
        public float $cost,
        public float $costRedelivery,
        public float $assessedCost,
    ) {
    }
}
