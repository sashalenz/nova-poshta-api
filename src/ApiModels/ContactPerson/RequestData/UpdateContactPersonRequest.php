<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\ContactPerson\RequestData;

use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Attributes\Validation\Uuid;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapOutputName(StudlyCaseMapper::class)]
final class UpdateContactPersonRequest extends Data
{
    public function __construct(
        #[Uuid]
        public string $counterpartyRef,
        #[Uuid]
        public string $ref,
        #[Max(36), StringType]
        public string $firstName,
        #[Max(36), StringType]
        public string $lastName,
        #[Max(36), StringType]
        public string $middleName,
        #[Max(36), StringType]
        public string $phone,
    ) {
    }
}
