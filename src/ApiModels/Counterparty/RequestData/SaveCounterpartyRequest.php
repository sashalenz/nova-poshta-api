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
final class SaveCounterpartyRequest extends Data
{
    public function __construct(
        #[Max(36), StringType]
        public Optional|string $firstName,
        #[Max(36), StringType]
        public Optional|string $middleName,
        #[Max(36), StringType]
        public Optional|string $lastName,
        #[Max(36), StringType]
        public Optional|string $phone,
        #[Max(36), Email]
        public Optional|string $email,
        #[Enum(CounterpartyType::class)]
        public CounterpartyType $counterpartyType,
        #[Enum(CounterpartyProperty::class)]
        public CounterpartyProperty $counterpartyProperty,
        #[Max(36), StringType, Nullable]
        public Optional|string $EDRPOU,
        #[Uuid, Nullable]
        public Optional|string $cityRef,
    ) {
    }
}
