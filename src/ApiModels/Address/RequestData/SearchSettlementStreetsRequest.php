<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\Address\RequestData;

use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Attributes\Validation\Uuid;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapOutputName(StudlyCaseMapper::class)]
final class SearchSettlementStreetsRequest extends Data
{
    public function __construct(
        public string $streetName,
        #[Uuid, Nullable]
        public string $settlementRef,
        public ?string $limit = '50'
    ) {
    }
}
