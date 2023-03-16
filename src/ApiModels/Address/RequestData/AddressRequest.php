<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\Address\RequestData;

use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\Validation\Uuid;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;
use Spatie\LaravelData\Optional;

#[MapOutputName(StudlyCaseMapper::class)]
final class AddressRequest extends Data
{
    public function __construct(
        #[Uuid]
        public string $counterpartyRef,
        #[Uuid]
        public string $streetRef,
        public string $buildingNumber,
        public Optional|string $flat,
        public Optional|string $note,
    ) {
    }
}
