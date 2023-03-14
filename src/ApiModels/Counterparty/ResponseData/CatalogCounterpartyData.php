<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\Counterparty\ResponseData;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapInputName(StudlyCaseMapper::class)]
final class CatalogCounterpartyData extends Data
{
    public function __construct(
        public string $refCounterparty,
        public string $description,
        public string $EDRPOU,
        public string $firstName,
        public string $lastName,
        public string $middleName,
        public string $ownershipForm,
    ) {
    }
}
