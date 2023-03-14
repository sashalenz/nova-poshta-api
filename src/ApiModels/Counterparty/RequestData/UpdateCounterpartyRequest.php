<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\Counterparty\RequestData;

use Sashalenz\NovaPoshtaApi\Enums\CounterpartyProperty;
use Sashalenz\NovaPoshtaApi\Enums\CounterpartyType;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\Validation\Email;
use Spatie\LaravelData\Attributes\Validation\Enum;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Attributes\Validation\Uuid;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;
use Spatie\LaravelData\Optional;

#[MapOutputName(StudlyCaseMapper::class)]
final class UpdateCounterpartyRequest extends Data
{
    public function __construct(
        #[Uuid]
        public string $ref,
        #[Uuid]
        public string $cityRef,
        #[Max(36), StringType]
        public string $firstName,
        #[Max(36), StringType]
        public string $middleName,
        #[Max(36), StringType]
        public string $lastName,
        #[Max(36), StringType, Nullable]
        public Optional|string $phone,
        #[Max(36), Email]
        public Optional|string $email,
        #[Enum(CounterpartyType::class)]
        public CounterpartyType $counterpartyType,
        #[Enum(CounterpartyProperty::class)]
        public CounterpartyProperty $counterpartyProperty,
        #[Max(36), StringType, Nullable]
        public Optional|string $EDRPOU,
    ) {
    }
}
