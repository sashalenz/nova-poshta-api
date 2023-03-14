<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\Counterparty\ResponseData;

use Sashalenz\NovaPoshtaApi\Enums\CounterpartyType;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;
use Spatie\LaravelData\Optional;

#[MapInputName(StudlyCaseMapper::class)]
final class CounterpartyData extends Data
{
    public function __construct(
        public string $ref,
        public string $description,
        public string $counterparty,
        public string $firstName,
        public string $lastName,
        public string $middleName,
        public Optional|string $counterpartyFullName,
        public Optional|string $ownershipForm,
        public Optional|string $ownershipFormRef,
        public Optional|string $ownershipFormDescription,
        public string $EDRPOU,
        public CounterpartyType $counterpartyType,
        public Optional|string $marketplacePartnerDescription,
        public Optional|string $city,
        public Optional|string $cityDescription,
        #[DataCollectionOf(CounterpartyContactPersonData::class)]
        public Optional|DataCollection $contactPerson
    ) {
    }
}
