<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\AdditionalService\ResponseData;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapInputName(StudlyCaseMapper::class)]
class CheckPossibilityCreateReturnData extends Data
{
    public function __construct(
        public bool $nonCash,
        public string $city,
        public string $counterparty,
        public string $contactPerson,
        public string $address,
        public string $phone,
        public string $ref,
        public string $type,
    ) {
    }
}
