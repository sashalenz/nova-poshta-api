<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\Counterparty\RequestData;

use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapOutputName(StudlyCaseMapper::class)]
final class GetCatalogCounterpartyRequest extends Data
{
    public function __construct(
        public string $lastName,
        public string $phone
    ) {
    }
}
