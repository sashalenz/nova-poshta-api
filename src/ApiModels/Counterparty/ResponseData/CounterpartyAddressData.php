<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\Counterparty\ResponseData;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapInputName(StudlyCaseMapper::class)]
final class CounterpartyAddressData extends Data
{
    public function __construct(
        public string $description,
        public string $ref,
        public string $cityRef,
        public string $cityDescription,
        public string $streetRef,
        public string $streetDescription,
        public string $buildingRef,
        public string $buildingDescription,
        public string $note,
        public string $addressName,
        public string $marketplacePartnerDescription,
    ) {
    }
}
