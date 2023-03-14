<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\Counterparty\ResponseData;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;
use Spatie\LaravelData\Optional;

#[MapInputName(StudlyCaseMapper::class)]
final class CounterpartyContactPersonData extends Data
{
    public function __construct(
        public string $description,
        public string $ref,
        public string $lastName,
        public string $firstName,
        public Optional|string $phones,
        public Optional|string $email,
        public Optional|null|string $middleName,
        public Optional|null|string $marketplacePartnerDescription,
    ) {
    }
}
