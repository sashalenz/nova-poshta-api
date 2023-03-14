<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\Counterparty\RequestData;

use Sashalenz\NovaPoshtaApi\Enums\CounterpartyProperty;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\Validation\Uuid;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\EnumCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;
use Spatie\LaravelData\Optional;

#[MapOutputName(StudlyCaseMapper::class)]
final class GetCounterpartyAddressesRequest extends Data
{
    public function __construct(
        #[Uuid]
        public string $ref,
        #[WithCast(EnumCast::class)]
        public Optional|CounterpartyProperty $counterpartyProperty,
        public ?string $page = '1'
    ) {
    }
}
