<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\AdditionalService\ResponseData;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapInputName(StudlyCaseMapper::class)]
final class ReturnReasonData extends Data
{
    public function __construct(
        public string $description,
        public string $ref,
    ) {
    }
}
