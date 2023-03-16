<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\ContactPerson\RequestData;

use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Attributes\Validation\Uuid;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;
use Spatie\LaravelData\Optional;

#[MapOutputName(StudlyCaseMapper::class)]
final class SaveContactPersonRequest extends Data
{
    public function __construct(
        #[Uuid]
        public string $counterpartyRef,
        #[Max(36), StringType]
        public string $firstName,
        #[Max(36), StringType]
        public string $lastName,
        #[Max(36), StringType]
        public Optional|string $middleName,
        #[Max(36), StringType]
        public string $phone,
    ) {
    }
}
